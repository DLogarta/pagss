    @include('partials.header')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Management</li>
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
                                    <h5>User Management</h5>
                                    <button type="button" class="btn btn-info btn-sm mx-1 mb-1" data-toggle="modal" data-target="#addUserModal">
                                            <i class="fas fa-plus"></i> Add New User
                                    </button>
                                </div>
                                <table id="example3" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-capitalize">Employee</th>
                                            <th class="text-capitalize">ID Number</th>
                                            <th class="text-capitalize">Position</th>
                                            <th class="text-capitalize">Email</th>
                                            <th class="text-capitalize">Access</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-capitalize">Employee</th>
                                            <th class="text-capitalize">ID Number</th>
                                            <th class="text-capitalize">Position</th>
                                            <th class="text-capitalize">Email</th>
                                            <th class="text-capitalize">Access</th>
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

        <div class="modal fade" id="addUserModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/user-management/add" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Add User Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label class="mb-0" for="name">ID Number:</label>
                            <input class="text-uppercase form-control mb-2" type="text" name="id_number" required>
                            <label class="mb-0" for="name">Name:</label>
                            <input class="text-capitalize form-control mb-2" type="text" name="name" required>
                            <label class="mb-0" for="name">Position:</label>
                            <input class="text-capitalize form-control mb-2" type="text" name="position" required>
                            <label class="mb-0" for="name">Email:</label>
                            <input class="form-control mb-2" type="text" name="email" required>
                            <label>Access/Permission</label>
                            <select id="roles_add" name="roles[]" class="duallistbox" multiple="multiple">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"><span class="badge badge-{{ $role->color }}">{{ $role->name }}</span></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editUserModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/user-management/update" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Edit User Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" id="edit-id" name="id" hidden required>
                            <label class="mb-0" for="name">ID Number:</label>
                            <input class="text-uppercase form-control mb-2" type="text" id="edit-id_number" name="id_number" required>
                            <label class="mb-0" for="name">Name:</label>
                            <input class="text-capitalize form-control mb-2" type="text" id="edit-name" name="name" required>
                            <label class="mb-0" for="name">Position:</label>
                            <input class="text-capitalize form-control mb-2" type="text" id="edit-position" name="position" required>
                            <label class="mb-0" for="name">Email:</label>
                            <input class="form-control mb-2" type="text" id="edit-email" name="email" required>
                            <label>Access/Permission</label>
                            <select id="roles" name="roles[]" class="duallistbox" multiple="multiple">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"><span class="badge badge-{{ $role->color }}">{{ $role->name }}</span></option>
                                @endforeach
                            </select>
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
        $('#example3').DataTable({
            processing: true, // Show processing indicator
            serverSide: true, // Enable server-side processing
            lengthChange: false,
            autoWidth: false,
            responsive: true,
            columnDefs: [
                { "orderable": false, "targets": -1 } // Disable sorting on the last column
            ],
            ajax: {
                url: '/user-management/data',
                type: 'GET'
            },
            columns: [
                {
                    data: 'name',
                    render: function (data, type, row) {
                        return `
                            <div class="user-panel d-flex">
                                <div class="image">
                                    <img src="/img/users/${row.pfp}" class="img-circle elevation-2" alt="User Image">
                                </div>
                                <div class="info">
                                    <p class="d-block mb-0 text-uppercase">${data}</p>
                                </div>
                            </div>`;
                    }
                },
                { data: 'id_number', className: 'align-middle text-uppercase' },
                { data: 'position', className: 'align-middle text-capitalize' },
                { data: 'email', className: 'align-middle' },
                {
                    data: 'roles',
                    render: function (data, type, row) {
                        if (Array.isArray(data) && data.length > 0) {
                            return data.map(function (role) {
                                return `<span class="badge badge-${role.color}">${role.name}</span>`;
                            }).join(' ');
                        }
                        return '<span class="text-muted">No Roles Assigned</span>';
                    }
                },
                {
                    data: 'id',
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex">
                                <button type="button" class="btn btn-info btn-sm mx-1" data-toggle="modal" data-target="#editUserModal" 
                                        data-id="${data}" data-idnumber="${row.id_number}" data-name="${row.name}" data-position="${row.position}" data-email="${row.email}" data-rolesid="${row.roles_id}" data-access='${JSON.stringify(row.roles)}'>
                                        <i class="fas fa-pencil-alt"></i>
                                </button>
                                <form method="POST" action="/user-management/delete" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this role?');">
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
    $('#roles_add').bootstrapDualListbox({
        nonSelectedListLabel: 'Available Roles',
        selectedListLabel: 'Selected Roles'
    });
    
</script>
<script>
    // Populate the modal with data from the clicked button
    $('#editUserModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const id = button.data('id');
        const id_number = button.data('idnumber');
        const name = button.data('name');
        const position = button.data('position');
        const email = button.data('email');

        $('#edit-id').val(id);
        $('#edit-id_number').val(id_number);
        $('#edit-name').val(name);
        $('#edit-position').val(position);
        $('#edit-email').val(email);
        const rolesData = button.data('rolesid');
        const con_rolesData = rolesData.toString();
        const rolesArray = con_rolesData.split(',').map(id => parseInt(id.trim()));
        var roles = @json($roles); // Passing the roles data from Blade

        $(document).ready(function() {
            $('#roles').bootstrapDualListbox({
                nonSelectedListLabel: 'Available Roles',
                selectedListLabel: 'Selected Roles'
            });

            // Clear existing options and then append new ones
            $('#roles').empty(); // Clear existing options

            var options = '';
            roles.forEach(function(role) {
                if (rolesArray.includes(role.id)) {
                    options += `<option value="${role.id}" selected>${role.name}</option>`;
                } else {
                    options += `<option value="${role.id}">${role.name}</option>`;
                }
            });

            $('#roles').append(options);

            // Refresh the Dual List Box
            $('#roles').bootstrapDualListbox('refresh');
        });
    });
</script>