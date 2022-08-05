@extends('layout.main')

@section('content')
	<div class="mb-5">
		<span class="fs-3 border-1 border-bottom pb-2 pe-3">Order Page</span>
	</div>

	<a href="/order/create" class="btn btn-outline-primary px-3 mb-2">Create Order</a>

	@if (session('success'))
		<div class="my-1">
			<span class="text-white bg-success">{{ session('success') }}</span>
		</div>
	@endif

	<div class="container">
		<div class="col-12">
			<table class="table table-striped text-center">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Code</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($order as $o)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $o->customer->nameCustomer }}</td>
							<td>{{ $o->code }}</td>
							<td>
								<a href="/order/show/{{ $o->id }}" class="btn btn-outline-info">View</a>
								<a href="/order/edit/{{ $o->id }}" class="btn btn-outline-warning">Edit</a>
								<a href="/order/destroy/{{ $o->id }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection