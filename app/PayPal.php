<?php

namespace App;

class PayPal {

	private $_apiContext;
	private $shopping_cart;
	private $_ClientId = 'AThvafH7ZRQpBJNXAKf1uHP8GM9GftmPG93zEI_0xTtEB9llebjcoP1hOY9E6AjLCMrQ87H1yGoxgtId';
	private $_ClientSecret = 'EEYqpjlWRda_y90fIZ_g5KCAsCVEjVQHD25H_zQJI6Br9fYN-KvulYTHJ547ESYv8g2IT9DqcP7DEKvg';

	public function __construct($shopping_cart){

		$this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);

		$config = config('paypal_payment');

		$flatConfig = array_dot($config);

		$this->_apiContext->setConfig($flatConfig);

		$this->shopping_cart = $shopping_cart;
	}


	//Metodo para Generar el Pago
	public function generate(){

		//setIntent() es el objetivo o sea vender
		//setPayer() informacion del comprador
		//setTransactions cosas que cobramos items
		//setRedirectUrls nos direcciona despues de un cobro o cancelacion


		$payment = \PaypalPayment::payment()->setIntent('sale')
									->setPayer($this->payer())
									->setTransactions([$this->transaction()])
									->setRedirectUrls($this->redirectURLs());
		try {
			$payment->create($this->_apiContext);
		} catch(\Exception $ex){
			dd($ex);
			exit(1);
		}

		return $payment;
	}

	public function payer(){
		//Returns payments's info
		return \PaypalPayment::payer()
						->setPaymentMethod('paypal');
	}

	public function transaction(){
		//Returns transaction's info
		return \PaypalPayment::transaction()
				->setAmount($this->amount())
				->setItemList($this->items())
				->setDescription('Tu Compra en Villarreal Store')
				->setInvoiceNumber(uniqid());
	}

	public function items(){
		$items = [];

		$products = $this->shopping_cart->products()->get();

		foreach ($products as $product) {
			array_push($items, $product->paypalItem());
		}

		return \PaypalPayment::itemList()->setItems($items);
	}

	public function amount(){
		return \PaypalPayment::amount()->setCurrency('USD')
							->setTotal($this->shopping_cart->total());
	}

	public function redirectURLs(){
		//Returns url's later payment
		$baseURL = url('/');
		return \PaypalPayment::redirectUrls()
								->setReturnUrl($baseURL . '/payments/store')
								->setCancelUrl($baseURL . '/carrito');
	}


	public function execute($paymentId, $payerId){
		$payment = \PaypalPayment::getById($paymentId, $this->_apiContext);

		$execution = \PaypalPayment::PaymentExecution()->setPayerId($payerId);

		return $payment->execute($execution, $this->_apiContext);

	}

}