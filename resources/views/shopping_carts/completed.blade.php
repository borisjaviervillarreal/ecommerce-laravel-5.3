@extends('layouts.app')

@section('content')

	<header class="big-padding text-center blue-grey white-text">
		<h1>Compra Realizada</h1>
	</header>

	<div class="container">
		<div class="card large-padding">
			<h3>Tu pago fue procesado <span class="{{$order->status}}">{{$order->status}}</span></h3>
			<p>Tu pedido sera enviado a la siguiente direccion: </p>

			<div class="row large-padding">
				<div class="col-xs-6">Email: </div>
				<div class="col-xs-6">{{$order->email}}</div>
			</div>

			<div class="row large-padding">
				<div class="col-xs-6">Direccion: </div>
				<div class="col-xs-6">{{$order->address()}}</div>
			</div>

			<div class="row large-padding">
				<div class="col-xs-6">Codigo Postal: </div>
				<div class="col-xs-6">{{$order->postal_code}}</div>
			</div>

			<div class="row large-padding">
				<div class="col-xs-6">Ciudad: </div>
				<div class="col-xs-6">{{$order->city}}</div>
			</div>

			<div class="row large-padding">
				<div class="col-xs-6">Estado y Pais: </div>
				<div class="col-xs-6">{{"$order->state $order->country_code"}}</div>
			</div>

			<div class="text-center top-space">
				<a href="{{url('/compras/'.$shopping_cart->customid)}}">Link permanente de tu compra</a>
			</div>
		</div>
	</div>



@endsection