@extends('layout.main')

@section('content')

	<div class="mt-3">
		<h1>Add Menu</h1>
	</div>

	<a href="/menu" class="btn my-3 btn-outline-primary fw-bold-btn-sm">
		<span>Back</span>
	</a>

	<div class="row">
		<div class="col-6">
			<div class="card card-body">
				<form action="/menu" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-floating mb-3">
						<input value="{{ old('nameMenu') }}" required type="text" name="nameMenu" required placeholder="Input Name" class="form-control" id="floatingInput">
						<label for="floatingInput">Name</label>
					</div>
					<div class="form-floating mb-3">
						<textarea class="form-control" required value="{{ old('descMenu') }}" name="descMenu" required placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px"></textarea>
						<label for="floatingTextarea">Description</label>
					</div>
					<div class="mb-3">
						<label for="image" class="form-label">Picture</label>
						<img class="img-preview ing-fluid mb-3 col-sm-5">
						<input name="photoMenu" class="form-control" type="file" id="image" onchange="previewImage()">
					</div>
					<div class="form-floating mb-3">
						<input value="{{ old('price') }}" required type="number" name="price" required placeholder="Input Price" class="form-control" id="floatingInput">
						<label for="floatingInput">Price</label>
					</div>
					<div class="input-group">
						<button class="btn btn-outline-success rounded me-1" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		function previewImage() {
            const image = document.querySelector("#image");
            const imgPreview = document.querySelector(".img-preview");

            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFEvent) {
                imgPreview.src = oFEvent.target.result;
            }
        }
	</script>
@endsection