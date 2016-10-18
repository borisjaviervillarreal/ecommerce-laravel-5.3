@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>Dashboard</h2>
			</div>
			<div class="panel-body">
				<h3>Estadisticas:</h3>
				<div class="row top-space">
					<div class="col-xs-4 col-md-3 col-lg-2 sale-data">
						<span>{{$totalMonth}} USD</span>
						Ingresos del mes
					</div>
					<div class="col-xs-4 col-md-3 col-lg-2 sale-data">
						<span>{{$totalMonthCount}}</span>
						Ventas en el mes actual
					</div>
				</div>
				<h3>Ventas del mes actual:</h3>
				<table class="table table-bordered">
					<thead>
						<tr>
							
							<td class="style-text">ID. venta</td>
							<td class="style-text">Comprador</td>
							<td class="style-text">Direccion</td>
							<td class="style-text">Numero de guia</td>
							<td class="style-text">Status</td>
							<td class="style-text">Fecha de venta</td>	
							
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $order)
							<tr>
								<td>{{$order->id}}</td>
								<td>{{$order->recipient_name}}</td>
								<td>{{$order->address()}}</td>
								<td>
									<a href="#" data-type="text" 
												data-pk="{{$order->id}}" 
												data-url="{{url("/orders/".$order->id)}}" 
												data-title="Numero de guia" 
												data-value="{{$order->guide_number}}"
												class="set-guide-number"
												data-name="guide_number">
									</a>
								</td>
								<td>
									<a href="#" data-type="select" 
												data-pk="{{$order->id}}" 
												data-url="{{url("/orders/".$order->id)}}" 
												data-title="Numero de guia" 
												data-value="{{$order->status}}"
												class="select-status"
												data-name="status">
									</a>
								</td>
								<td>{{$order->created_at}}</td>
								
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{{$orders->render()}}
				</div>
			</div>
		</div>
	</div>

@endsection