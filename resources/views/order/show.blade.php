@extends('layout.main')

@section('content')
	<div class="mb-4">
		<span class="fs-3 border-1 border-bottom pb-2 pe-3">Detail Order</span>
	</div>

	<a href="/order/index" class="btn btn-outline-secondary mb-3">Back</a>

	<div class="container">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="mb-3">
						<p class="m-0">Customer : </p>
						<small class="fst-italic">
							{{ $order->customer->nameCustomer }}
							{{ $order->customer->member ? '(member)' : ''}}
						</small>
					</div>
					<div class="mb-3">
						<p class="m-0">Order Code : </p>
						<small class="fst-italic">
							{{ $order->code }}
						</small>
					</div>
					<div class="mb-3">
						<p class="m-0">Detail Order : </p>
						@foreach ($order->orderItem as $orderItem)
							<div>
								<small>{{ $orderItem->menu->nameMenu }}</small>
								<small>{{ $orderItem->quantity }}</small>
								<small>{{ $orderItem->subTotal }}</small>
							</div>
						@endforeach

						@if ($order->customer->member)
							<div class="text-end fst-italic">
								<small class="me-3">Discount Member :</small>
								<small class="border-top border-dark">10%</small>
							</div>
						@endif

						<div class="text-end fst-italic">
							<small class="me-3">Total :</small>
								<small class="border-top border-dark">{{ $order->total }}</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection