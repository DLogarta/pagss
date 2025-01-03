    @include('partials.header')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Client Management</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5>Client Management</h5>
                                    <button type="button" class="btn btn-info btn-sm mx-1 mb-1" data-toggle="modal" data-target="#addClientModal">
                                            <i class="fas fa-plus"></i> Add New Client
                                    </button>
                                </div>
                                <table id="example2" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-capitalize">Client</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-capitalize">Client</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="addClientModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/c-clients/add" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Add Client Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <center>
                                    <img class="img-fluid" style="height:200px;" id="edit-image-add" src="{{ asset('/img/organization/image-placeholder.jpg' ?? '/img/organization/image-placeholder.jpg') }}"></img>
                                </center>
                                <br>
                                <label for="name">Image:</label>
                                <input class="text-uppercase form-control" type="file" id="image-input-add" name="image" required>
                                
                                <label for="name">Name:</label>
                                <input class="text-uppercase form-control" type="text" name="name" required>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Information</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editClientModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/c-clients/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Client Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <input class="form-control" id="edit-id" name="id" hidden required>

                                <center>
                                    <img class="img-fluid" style="height:200px;" id="edit-image" src="{{ asset('/img/organization/image-placeholder.jpg') }}"></img>
                                </center>
                                <br>
                                <label for="name">Image:</label>
                                <input class="text-uppercase form-control" type="file" id="image-input" name="image">
                                
                                <label for="name">Name:</label>
                                <input class="text-uppercase form-control" type="text" id="edit-name" name="name" required>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('partials.footer')
<script>
    $(document).ready(function () {
        $('#example2').DataTable({
            processing: true, // Show processing indicator
            serverSide: true, // Enable server-side processing
            columnDefs: [
                { "orderable": false, "targets": -1 } // Disable sorting on the last column
            ],
            ajax: {
                url: '/c-clients/data',
                type: 'GET'
            },
            columns: [
                {
                    data: 'name',
                    render: function (data, type, row) {
                        return `
                            <div class="user-panel d-flex">
                                <div class="image">
                                    <img src="/img/clients/${row.image}" class="img-square" alt="User Image">
                                </div>
                                <div class="info">
                                    <p class="d-block mb-0 text-uppercase">${data}</p>
                                </div>
                            </div>`;
                    }
                },
                {
                    data: 'id',
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex">
                                <button type="button" class="btn btn-info btn-sm mx-1" data-toggle="modal" data-target="#editClientModal" 
                                        data-id="${data}" data-image="${row.image}" data-name="${row.name}">
                                        <i class="fas fa-pencil-alt"></i>
                                </button>
                                <form method="POST" action="/c-clients/delete" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this client?');">
                                    @csrf
                                    <input type="hidden" name="id" value="${data}">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>`;
                    }
                }
            ]
        });
    });
</script>
<script>
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
</script>
@if (session('delete-error'))
<script>
        Toast.fire({
            icon: 'error',
            title: '{{ session('delete-error') }}'
        })
    </script>
@endif
@if (session('delete-success'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{ session('delete-success') }}'
        })
    </script>
@endif
@if (session('update-success'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{ session('update-success') }}'
        })
    </script>
@endif
@if (session('add-success'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{ session('add-success') }}'
        })
    </script>
@endif
<script>
    var current_image;
    $('#image-input').on('change', function() {
        const file = this.files[0]; // Get the selected file
        const reader = new FileReader();

        reader.onload = function(e) {
            $('#edit-image').attr('src', e.target.result); // Update the image src
        };

        if (file) {
            reader.readAsDataURL(file); // Convert file to data URL for preview
        } else {
            // If no file selected, revert to the original image
            $('#edit-image').attr('src', 'img/clients/'+current_image);
        }
    });

    $('#image-input-add').on('change', function() {
        const file = this.files[0]; // Get the selected file
        const reader = new FileReader();

        reader.onload = function(e) {
            $('#edit-image-add').attr('src', e.target.result); // Update the image src
        };

        if (file) {
            reader.readAsDataURL(file); // Convert file to data URL for preview
        } else {
            // If no file selected, revert to the original image
            $('#edit-image-add').attr('src', 'img/organization/image-placeholder.jpg');
        }
    });

    // Populate the modal with data from the clicked button
    $('#editClientModal').on('show.bs.modal', function (event) {
        $('#image-input').val('');

        const button = $(event.relatedTarget); // Button that triggered the modal
        const id = button.data('id');
        current_image = button.data('image');
        const name = button.data('name');

        // Populate the modal fields
        $('#edit-id').val(id);
        $('#edit-name').val(name);
        $('#edit-image').attr('src','img/clients/'+current_image);
    });
</script>