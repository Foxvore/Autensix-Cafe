@extends('layout.main')

@section('content')
	<div class="mb-4">
		<span class="fs-3 border-1 border-bottom pb-2 pe-3">Edit Order</span>
	</div>

	<a href="/order/index" class="btn btn-outline-secondary mb-3">Back</a>

	<div class="container">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<form action="/order/update/{{ $order->id }}" method="POST">
						@csrf
						<div class="mb-3">
							<label class="form-label">Customer : </label>
							<select name="customerId" class="form-select">
								@foreach ($customer as $c)
									@if ($order->customerId == $c->id)
										<option value="{{ $c->id }}" selected>{{ $c->nameCustomer }}</option>
									@else
										<option value="{{ $c->id }}">{{ $c->nameCustomer }}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="mb-3 menu-conntainer">
							<label class="form-label">Menu</label>
							<button class="btn btn-outline-info btn-add-menu" type="button"></button>
							@foreach ($order->orderItem as $key => $orderItem)
								<div class="input-group mb-1 menu">
									<select name="menuId[]" class="form-select">
										<option></option>
										@foreach ($menu as $m)
											@if ($orderItem->menuId == $m->id)
												<option value="{{ $m->id }}" selected>{{ $m->nameMenu }}</option>
											@else
												<option value="{{ $m->id }}">{{ $m->nameMenu }}</option>
											@endif
										@endforeach
									</select>
									<input type="number" name="quantity[]" class="form-control" placeholder="Input Quantity" value="1">
									@if ($key == 0)
										<a class="btn btn-outline-secondary"></a>
									@else
										<a class="btn btn-outline-danger btn-delete-menu"></a>
									@endif
								</div>
							@endforeach
						</div>
						<div class="d-grid">
							<button class="btn btn-outline-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
    	$('.btn-add-menu').click(function() {
        	$('.menu-container').append(menu())
    	})

    	$(document).on('click', '.btn-delete-menu', function(){
        	$(this).closest('.menu').remove()
    	})

	    function menu(){
		     return `<div class="input-group mb-1 menu">
		                <select name="menuId[]" id="" class="form-select">
		                    <option>-- Pilih Menu --</option>
		                    @foreach ($menu as $m)
		                        <option value="{{ $m->id }}"> {{ $m->nameMenu }}</option>
		                    @endforeach
		                </select>
		                <input type="number" name="quantity[]" placeholder="Qty." value="1" class="form-control">
		                <a class="btn btn-outline-danger btn-delete-menu text-white">Delete</a>
		            </div>`  
		    }
	</script>
@endsection	