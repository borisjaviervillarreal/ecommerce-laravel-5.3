@extends('layouts.app')

@section('title', 'Productos')

@section('content')
	<div class="text-center products-container">
		<div class="row">
		@foreach($products as $product)
		<div class="col-xs-10 col-sm-6">
			@include('products.product', ['product' => $product])
		</div>
		@endforeach
		</div>
	</div>
	<div class="text-center">
		{{$products->render()}}
	</div>
@endsection