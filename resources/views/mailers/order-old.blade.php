<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h1>Hola: {{$order->recipient_name}}</h1>
	<p>Te enviamos los datos de tu compra realizada en Villarreal Store</p>

	<table>
		<thead>
			<tr>
				<th>Producto</th>
				<th>Precio</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
			<tr>
				<td>{{$product->title}}</td>
				<td>{{$product->pricing}}</td>
			</tr>
			@endforeach
		</tbody>
		<tr>
			<td>Total:</td>
			<td>{{$order->total}}</td>
		</tr>
	</table>
</body>
</html>