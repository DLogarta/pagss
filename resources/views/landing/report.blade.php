@include('partials.landing.header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content-wrapper">
    <section id="1" class="hero screen-height image">
        <img class="hero-image" src="{{ asset('/img/contact-bg.jpg') }}">
        @include('partials.landing.sidenav')
        <div class="page-info">
            <h1>Helpdesk</h1>
        </div>
    </section>
    <section id="2" class="mx-5 my-5 px-lg-5 px-md-0">
        <div class="container">
            <form action="/report/add" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control" placeholder="Full Name" name="name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control" placeholder="Employee ID" name="id_number">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control" placeholder="Email Address" name="email">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input class="form-control" type="text" placeholder="Enter issue subject" name="subject">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input class="form-control" type="text" placeholder="Location" name="location">
                    </div>
                    <div class="col-md-3 mb-3">
                        <select class="form-control" name="priority_level">
                            <option selected disabled>Select Priority Level</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                            <option value="Critical">Critical</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <textarea class="form-control" placeholder="Describe the issue here" rows="10" name="description"></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="imageUpload" class="form-label">Upload Images</label>
                    <div id="imageUpload" class="dropzone"></div>
                </div>
                <input type="hidden" name="uploaded_images" id="uploaded_images">
                <button class="btn btn-primary cta-btn-reverse mt-0" type="submit">submit</button>
            </form>
        </div>
    </section>
</div>
@include('partials.landing.footer')
<script>
    Dropzone.autoDiscover = false;

    let uploadedFiles = [];

    const myDropzone = new Dropzone('#imageUpload', {
        url: '/report/add-img',
        maxFilesize: 2, // Maximum file size in MB
        maxFiles: 10, // Maximum number of files
        acceptedFiles: 'image/*', // Only accept images
        addRemoveLinks: true,
        dictDefaultMessage: 'Drag and drop images here or click to upload',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        success: function (file, response) {
            if (response.success) {
                uploadedFiles.push(response.success); // Add uploaded file name
            }
            console.log('Successfully uploaded:', response);
        },
        error: function (file, errorMessage) {
            console.error('Upload error:', errorMessage);
        },
        removedfile: function (file) {
            const fileName = file.upload.filename;
            uploadedFiles = uploadedFiles.filter(name => name !== fileName); // Remove file name
            $.ajax({
                type: 'POST',
                url: '/report/remove-img',
                data: {
                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    filename: fileName,
                },
                success: function (data) {
                    console.log('File removed successfully');
                },
                error: function (e) {
                    console.error('Error removing file:', e);
                },
            });
            const previewElement = file.previewElement;
            if (previewElement != null) {
                previewElement.parentNode.removeChild(previewElement);
            }
        }
    });

    // Attach event listener to the form to pass uploaded file names before submission
    document.querySelector('form').addEventListener('submit', function (e) {
        document.querySelector('#uploaded_images').value = JSON.stringify(uploadedFiles);
    });
</script>
<script>
    @if (session('success'))
        window.onload = function() {
        alert("{{ session('success') }}");
    };
    @endif
    @if (session('error'))
        window.onload = function() {
        alert("{{ session('error') }}");
    };
    @endif
</script>

