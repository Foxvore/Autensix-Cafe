@extends('layout.main')

@section('content')
	<div class="mb-4">
		<span class="fs-3 border-1 border-bottom pb-2 pe-3">Create Order</span>
	</div>

	<a href="/order/index" class="btn btn-outline-secondary mb-3">Back</a>

	<div class="container">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<form action="/order/store" method="POST">
						@csrf
						<div class="mb-3">
							<label class="form-label">Customer : </label>
							<select name="customerId" class="form-select">
								<option></option>
								@foreach ($customer as $c)
									<option value="{{ $c->id }}">{{ $c->nameCustomer }}</option>
								@endforeach
							</select>
						</div>
						<div class="mb-3 menu-container">
							<label class="form-label">Menu</label>
							<button class="btn btn-outline-info btn-add-menu" type="button"></button>
							<div class="input-group mb-1 menu">
								<select name="menuId[]" class="form-select">
									<option></option>
									@foreach ($menu as $m)
										<option value="{{ $m->id }}">{{ $m->nameMenu }}</option>
									@endforeach
								</select>
								<input type="number" name="quantity[]" class="form-control" placeholder="Input Quantity" value="1">
								<a class="btn btn-outline-secondary"></a>
							</div>
						</div>
						<div class="d-grid">
							<button class="btn btn-outline-primary">Create</button>
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

    	function menu() {
    		return `<div class="input-group mb-1 menu">
    					<select name="menuId[]" class="form-select">
    						<option></option>
    						@foreach ($menu as $m)
    							<option value="{{ $m->id }}">{{ $m->nameMenu }}</option>
    						@endforeach
    					</select>
    					<input type="number" name="quantity[]" class="form-control" placeholder="Input Quantity" value="1">
    					<a class="btn btn-outline-danger btn-delete-menu"><i class="bi bi-x"></i></a>
    				</div>`
    	}
	</script>
@endsection	