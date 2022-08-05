@extends('layout.main')

@section('content')
	<div class="mb-5">
		<span class="fs-3 border-1 border-bottom pb-2 pe-3">Customer Page</span>
	</div>

	<a href="/customer/create" class="btn btn-outline-primary px-3 mb-2">Create</a>

	@if (session('success'))
		<p class="text-success">{{ session('success') }}</p>
	@endif

	<div class="row">
		<div class="col-18">
			<table class="table table-striped text-center">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($customer as $customer)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $customer->nameCustomer }}</td>
							<td>
								<a href="/customer/edit/{{ $customer->id }}" class="btn btn-outline-warning">Edit</a>
								<a href="/customer/destroy/{{ $customer->id }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection