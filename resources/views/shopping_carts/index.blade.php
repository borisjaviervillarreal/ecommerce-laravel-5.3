@extends('layouts.app')

@section('content')
<div class="big-padding text-center blue-grey white-text">
	<h1>Tu carrito de compras</h1>
</div>

<div class="container">
	<table class="table table-bordered">
		<thead>
			<tr>
				<td class="style-text">Producto</td>
				<td class="style-text">Precio</td>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
			<tr>
				<td>{{$product->title}}</td>
				<td>$ {{$product->pricing}}</td>
			</tr>
			@endforeach
			<tr>
				<td class="style-text">Total: </td> 
				<td class="style-text">$ {{$total}}</td>
			</tr>
		</tbody>
	</table>
	<div class="text-right">
		@include('shopping_carts.form')
	</div>
	<div class="text-center">
		{{$products->render()}}
	</div>
</div>
@endsection