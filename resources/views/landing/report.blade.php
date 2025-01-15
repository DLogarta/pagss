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
                        <input type="text" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control" placeholder="Employee ID">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control" placeholder="Phone Number">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input class="form-control" type="text" placeholder="Enter issue subject">
                    </div>
                    <div class="col-md-6 mb-3">
                        <select class="form-control">
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
                        <textarea class="form-control" placeholder="Describe the issue here" rows="10"></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="imageUpload" class="form-label">Upload Images</label>
                    <div id="imageUpload" class="dropzone"></div>
                </div>
                <button class="btn btn-primary cta-btn-reverse mt-0" type="submit">submit</button>
            </form>
        </div>
    </section>
</div>
@include('partials.landing.footer')
<script>
    Dropzone.autoDiscover = false;

    const myDropzone = new Dropzone('#imageUpload', {
        url: '/report/add-img',
        maxFilesize: 2,
        maxFiles: 10,
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        dictDefaultMessage: 'Drag and drop images here or click to upload',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        success: function (file, response) {
            console.log('Successfully uploaded:', response);
        },
        error: function (file, errorMessage) {
            console.error('Upload error:', errorMessage);
        },
        removedfile: function (file) {
            const fileName = file.upload.filename;
            $.ajax({
                type: 'POST',
                url: '/report/remove-img',
                data: {
                    _token: '{{ csrf_token() }}',
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
        },
        init: function () {
            this.on('error', function (file, errorMessage) {
                if (file.size > this.options.maxFilesize * 1024 * 1024) {
                    alert(`File ${file.name} is too large. Maximum size is ${this.options.maxFilesize} MB.`);
                    this.removeFile(file);
                } else if (!file.type.match('image.*')) {
                    alert(`File ${file.name} is not a valid image.`);
                    this.removeFile(file);
                } else {
                    console.error(errorMessage);
                }
            });
        },
    });
</script>

