{!! Form::open(['url' => $url,'method' => $method, 'files' => true])!!}
	<div class="form-group">
		{{ Form::text('title', $product->title, ['class'=>'form-control', 'placeholder'=>'Titulo del articulo']) }}
	</div>
	<div class="form-group">
		{{ Form::number('pricing', $product->pricing, ['class'=>'form-control', 'placeholder'=>'Precio de tu articulo en centavos de dolar'])}}
	</div>
	<div class="form-group">
		{{ Form::file('cover')}}
	</div>
	<div class="form-group">
		{{ Form::textarea('description', $product->description, ['class'=>'form-control', 'placeholder'=>'Describe tu articulo'])}}
	</div>
	<div class="form-group text-right">
		<a href="{{url('/products')}}">Regresar al listado de productos</a>
		{!! Form::submit('Enviar', ['class'=>'btn btn-success'])!!}
	</div>
{!! Form::close()!!}