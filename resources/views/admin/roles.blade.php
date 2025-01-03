    @include('partials.header')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Roles Management</li>
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
                                    <h5>Roles Management</h5>
                                    <button type="button" class="btn btn-info btn-sm mx-1 mb-1" data-toggle="modal" data-target="#addRoleModal">
                                            <i class="fas fa-plus"></i> Add New Role
                                    </button>
                                </div>
                                <table id="example2" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-capitalize">Role Name</th>
                                            <th class="text-capitalize">Role Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-capitalize">Role Name</th>
                                            <th class="text-capitalize">Role Description</th>
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

        <div class="modal fade" id="addRoleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/role-management/add" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Add Role Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label class="mb-0" for="name">Role Name:</label>
                            <input class="text-capitalize form-control mb-2" type="text" name="name" required>
                            <label class="mb-0" for="name">Role Description:</label>
                            <input class="text-capitalize form-control mb-2" type="text" name="description" required>
                            <label for="name">Color:</label><br>
                            <div class="d-flex justify-content-around mb-2">
                                <div>
                                    <input type="radio" id="green" name="color" value="success">
                                    <label for="green"><span class="badge badge-success">Green</span></label>
                                </div>
                                <div>
                                    <input type="radio" id="blue" name="color" value="primary">
                                    <label for="blue"><span class="badge badge-primary">Blue</span></label>
                                </div>
                                <div>
                                    <input type="radio" id="yellow" name="color" value="warning">
                                    <label for="yellow"><span class="badge badge-warning">Yellow</span></label>
                                </div>
                                <div>
                                    <input type="radio" id="red" name="color" value="danger">
                                    <label for="red"><span class="badge badge-danger">Red</span></label>
                                </div>
                            </div>
                            <label class="mb-0" for="name">Permissions:</label><br>
                            <div class="d-flex mb-2">
                                @foreach ($permissions as $permission)
                                <div class="mx-2">
                                    <input type="checkbox" id="{{$permission->name}}" name="permissions[]" value="{{$permission->id}}">
                                    <label for="{{$permission->name}}">{{$permission->name}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editRoleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/role-management/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Role Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" id="edit-id" name="id" hidden required>
                            <label class="mb-0" for="name">Role Name:</label>
                            <input class="text-capitalize form-control mb-2" type="text" name="name" id="edit-name" required>
                            <label class="mb-0" for="name">Role Description:</label>
                            <input class="text-capitalize form-control mb-2" type="text" name="description" id="edit-description" required>
                            <label class="mb-0" for="name">Color:</label><br>
                            <div class="d-flex justify-content-around mb-2">
                                <div>
                                    <input type="radio" id="edit_green" name="edit-color" value="success">
                                    <label for="edit_green"><span class="badge badge-success">Green</span></label>
                                </div>
                                <div>
                                    <input type="radio" id="edit_blue" name="edit-color" value="primary">
                                    <label for="edit_blue"><span class="badge badge-primary">Blue</span></label>
                                </div>
                                <div>
                                    <input type="radio" id="edit_yellow" name="edit-color" value="warning">
                                    <label for="edit_yellow"><span class="badge badge-warning">Yellow</span></label>
                                </div>
                                <div>
                                    <input type="radio" id="edit_red" name="edit-color" value="danger">
                                    <label for="edit_red"><span class="badge badge-danger">Red</span></label>
                                </div>
                            </div>
                            <label class="mb-0" for="name">Permissions:</label><br>
                            <div class="d-flex mb-2">
                                @foreach ($permissions as $permission)
                                <div class="mx-2">
                                    <input class="perms-checkbox" type="checkbox" id="edit_{{$permission->name}}" name="permissions[]" value="{{$permission->id}}">
                                    <label for="edit_{{$permission->name}}">{{$permission->name}}</label>
                                </div>
                                @endforeach
                            </div>
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
            lengthChange: false,
            autoWidth: false,
            responsive: true,
            columnDefs: [
                { "orderable": false, "targets": -1 } // Disable sorting on the last column
            ],
            ajax: {
                url: '/role-management/data',
                type: 'GET'
            },
            columns: [
                {
                    data: 'name',
                    render: function (data, type, row) {
                        return `
                            <span class="badge badge-${row.color}">${data}</span>
                        `;
                    }
                },
                { data: 'description', className: 'align-middle text-capitalize' },
                {
                    data: 'id',
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex">
                                <button type="button" class="btn btn-info btn-sm mx-1" data-toggle="modal" data-target="#editRoleModal" 
                                        data-id="${data}" data-name="${row.name}" data-description="${row.description}" data-color="${row.color}" data-permission="${row.permissions}">
                                        <i class="fas fa-pencil-alt"></i>
                                </button>
                                <form method="POST" action="/role-management/delete" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this role?');">
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
@if (session('update-failed'))
    <script>
        Toast.fire({
            icon: 'error',
            title: '{{ session('update-failed') }}'
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
@if (session('add-failed'))
    <script>
        Toast.fire({
            icon: 'error',
            title: '{{ session('add-failed') }}'
        })
    </script>
@endif
<script>
    // Populate the modal with data from the clicked button
    $('#editRoleModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget); // Button that triggered the modal
        const id = button.data('id');
        const name = button.data('name');
        const description = button.data('description');
        const color = button.data('color')
        const permission = button.data('permission');

        // Populate the modal fields
        $('#edit-id').val(id);
        $('#edit-name').val(name);
        $('#edit-description').val(description);
        $('input[name="edit-color"][value="' + color + '"]').prop('checked', true);
        $('.perms-checkbox').prop('checked', false); // Uncheck all first
        if (permission) {
            let con_permission;
            con_permission = permission.toString();
            const permissionArray = con_permission.split(', '); // Split the string into an array
            permissionArray.forEach(permission => {
                $(`.perms-checkbox[value="${permission}"]`).prop('checked', true);
            });
        }
    });
</script>