@extends('layout.main')

@section('content')
	<div class="mb-4 text-center">
		<span class="fs-3 border-1 border-bottom">Create Customer</span>
	</div>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<a href="/customer/index" class="btn btn-outline-secondary mb-3" title="back">Back</a>
				<form action="/customer/store" method="POST">
					@csrf
					<div class="mb-3">
						<label class="form-label">Name :</label>
						<input type="text" name="nameCustomer" class="form-control">
					</div>
					<div class="mb-3">
						<label class="form-label">Email :</label>
						<input type="text" name="emailCustomer" class="form-control">
					</div>
					<div class="mb-3">
						<label class="form-label">Phone :</label>
						<input type="text" name="phoneCustomer" class="form-control">
					</div>
					<div class="mb-3">
						<div class="form-check">
							<label class="form-lab">Member</label>
							<input type="checkbox" name="member" value="1" class="form-check-input">
						</div>
					</div>
					<div class="d-grid">
						<button class="btn btn-outline-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection