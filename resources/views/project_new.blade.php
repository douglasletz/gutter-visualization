@extends("layouts.master")


@section("title")
Upload Home | Rain Gutter Visualizer
@endsection

@section("content")
<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('/images/background/6.jpg') }});">
	<div class="auto-container">
		<div class="inner-container clearfix">
			<h1>Prepare your home to visualize</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="/">Home</a></li>
				<li>Upload Home</li>
			</ul>
		</div>
	</div>
</section>
<!--End Page Title-->

<section class="upload-project">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">

				<div class="browse-head">	
					<div class="browse-project">

						<form action="{{route('upload_myhome')}}" id="form" enctype="multipart/form-data" method="POST">
							@csrf
							<!-- <div class="dropzone" id="myDropzone"></div> -->
							<input type="file" id="file" name="file" accept="image/png, image/gif, image/jpeg" required>
							<input type="submit"  class="theme-btn btn-style-three" value="Start your project" name="start_your_project">

						</form>

					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="browse-content">
					<h2>Upload your own image</h2>
					<h5>For best results, make sure your image follows these guidelines:</h5>

					<ul>
						<li>Minimum 800px wide</li>
						<li>JPG, JPEG or PNG formats (Cannot accept blueprints in PDF format)</li>
						<li>Maximum file size of 10 MB</li>
						<li>Clear view of the subject with no obstructions</li>
						<li>High-quality image with no blurriness</li>
					</ul>

					
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section("script")

<script type="text/javascript">

	var uploadField = document.getElementById("file");

	uploadField.onchange = function() {
		if(this.files[0].size > 10485760){
			alert("File exceeding the limit size, which is 10 MB!");
			this.value = "";
		};
	};


	var _URL = window.URL || window.webkitURL;

function isSupportedBrowser() {
    return window.File && window.FileReader && window.FileList && window.Image;
}

function getSelectedFile() {
    var fileInput = document.getElementById("file");
    var fileIsSelected = fileInput && fileInput.files && fileInput.files[0];
    if (fileIsSelected)
        return fileInput.files[0];
    else
        return false;
}

function isGoodImage(file) {
    var deferred = jQuery.Deferred();
    var image = new Image();

     image.onload = function() {
        // Check if image is bad/invalid
        if (this.width === 0) {
            this.onerror();
            return;
        }

        // Check the image resolution
        if (this.width >= 800) {
            deferred.resolve(true);
        } else {
            alert("The image resolution is low than required. Minimum 800px");
            deferred.resolve(false);
        }
    };

    image.onerror = function() {
        alert("Invalid image. Please select an image file.");
        deferred.resolve(false);
    }

    image.src = _URL.createObjectURL(file);

    return deferred.promise();
}


$("#form").submit(function(event) {
    var form = this;

    if (isSupportedBrowser()) {
        event.preventDefault(); //Stop the submit for now

        var file = getSelectedFile();
        if (!file) {
            alert("Please select an image file.");
            return;
        }

        isGoodImage(file).then(function(isGood) {
            if (isGood)
                form.submit();
        });
    }
});

</script>
@endsection