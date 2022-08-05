@extends('layout.main')

@section('content')

	@if(session()->has('success'))
	<div class="alert mt-4 alert-success alert-dismissible fade show" role="alert">
		{{ session('success') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
	</div>
	@endif

	<div class="mt-3">
		<h1>Menu Page</h1>
	</div>

	<a href="/menu/create" class="btn my-3 btn-outline-success btn-sm">
		<span>Input Menu</span>
	</a>

	<div class="container-fluid">
		<div class="col-12">
			<table class="table table-responsive table-hover table-striped text-center">
				<thead>
					<tr>
						<td>No</td>
						<td>Name</td>
						<td>Description</td>
						<td>Picture</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					@foreach ($menus as $menu)

					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $menu->nameMenu }}</td>
						<td>{{ $menu->descMenu }}</td>
						{{-- <td>
							<img src="{{ ($menu->photoMenu) ? asset ('storage/'. $menu->photoMenu) : '' }}" width="200px" height="150px" alt="photo menu" class="img-thumbnail img-fluid">
						</td> --}}
						<td>
							@if(!$menu->photoMenu)
								<img src="{{ asset('storage/images/defaultmenu.png') }}" width="200px" height="150px" alt="photo menu" class="img-thumbnail img-fluid">
							@else
								<img src="{{ asset('storage/'. $menu->photoMenu ) }}" width="200px" height="150px" alt="photo menu" class="img-thumbnail img-fluid">
							@endif
						</td>
						<td>{{ $menu->price }}</td>
						<td>
							<a href="/menu/{{ $menu->id }}/edit" class="btn me-1 btn-sm btn-outline-warning">
								<span data-feather="edit">Edit</span>
							</a>
							<form action="/menu/{{ $menu->id }}" method="POST" class="d-inline">
								@method('delete')
								@csrf
								<button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm">
									<span data-feather="trash-2">Delete</span>
								</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection