<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
	//Mass assignment
	protected $fillable = ['status'];

	public function approve(){
		$this->updateCustomIDAndStatus();

	}

	public function generateCustomID(){
		return md5("$this->id $this->updated_at");
	}

	public function updateCustomIDAndStatus(){
		$this->status = "approved";
		$this->customid = $this->generateCustomID();
		$this->save();
	}

	//RELACIONES

	public function inShoppingCarts(){
		return $this->hasMany('App\inShoppingCart');
	}

	public function products(){
		return $this->belongsToMany('App\Product', 'in_shopping_carts');
	}

	public function order(){
		return $this->hasOne('App\Order')->first();
	}

	public function total(){
		return $this->products()->sum('pricing');
	}



	//Cuantos items hay en el carrito de compras
	public function productsSize(){
		return $this->products()->count();

	}

    public static function findOrCreateBySessionID($shopping_cart_id){
    	if($shopping_cart_id)
    		//Si existe este id Buscar el carrito de compras con ese id
    		return ShoppingCart::findBySession($shopping_cart_id);
    	else
    		//Si no existe este id crear carrito de compras
    		return ShoppingCart::createWithoutSession();
    }

	public static function findBySession($shopping_cart_id){
		return ShoppingCart::find($shopping_cart_id);
	}

	public static function createWithoutSession(){
		return ShoppingCart::create([
			'status'=>'incompleted'
			]);
	}
}
