    @include('partials.header')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">IT Helpdesk</li>
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
                                    <h5>Helpdesk Tickets</h5>
                                </div>
                                <table id="example3" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-capitalize">Ticket #</th>
                                            <th class="text-capitalize">Name</th>
                                            <th class="text-capitalize">Concern</th>
                                            <th class="text-capitalize">Priority Level</th>
                                            <th class="text-capitalize">Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-capitalize">Ticket #</th>
                                            <th class="text-capitalize">Name</th>
                                            <th class="text-capitalize">Concern</th>
                                            <th class="text-capitalize">Priority Level</th>
                                            <th class="text-capitalize">Status</th>
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
                url: '/it-helpdesk/data',
                type: 'GET'
            },
            columns: [
                { data: 'id', className: 'align-middle text-uppercase' },
                { data: 'name', className: 'align-middle text-capitalize' },
                { data: 'subject', className: 'align-middle text-capitalize' },
                {
                    data: 'priority_level',
                    render: function (data, type, row) {
                        let badgeClass = '';
                        switch (data) {
                            case 'Low':
                                badgeClass = 'badge-info';
                                break;
                            case 'Medium':
                                badgeClass = 'badge-success';
                                break;
                            case 'High':
                                badgeClass = 'badge-warning';
                                break;
                            case 'Critical':
                                badgeClass = 'badge-danger';
                                break;
                            default:
                                badgeClass = 'badge-secondary';
                                break;
                        }
                        return `<span class="badge ${badgeClass}">${data}</span>`
                    }
                },
                {
                    data: 'status',
                    render: function (data, type, row) {
                        let badgeClass = '';
                        switch (data) {
                            case 'Ongoing':
                                badgeClass = 'badge-info';
                                break;
                            case 'Resolved':
                                badgeClass = 'badge-success';
                                break;
                            case 'Pending':
                                badgeClass = 'badge-warning';
                                break;
                            case 'Fake':
                                badgeClass = 'badge-danger';
                                break;
                            default:
                                badgeClass = 'badge-secondary';
                                break;
                        }
                        return `<span class="badge ${badgeClass}">${data}</span>`
                    }
                },
                {
                    data: 'id',
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex">
                                <button type="button" class="btn btn-info btn-sm mx-1" data-toggle="modal" data-target="#editUserModal"
                                        data-id="${data}">
                                        <i class="fas fa-eye"></i>
                                </button>
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
{{--<script>--}}
{{--    // Populate the modal with data from the clicked button--}}
{{--    $('#editUserModal').on('show.bs.modal', function (event) {--}}
{{--        const button = $(event.relatedTarget);--}}
{{--        const id = button.data('id');--}}
{{--        const id_number = button.data('idnumber');--}}
{{--        const name = button.data('name');--}}
{{--        const position = button.data('position');--}}
{{--        const email = button.data('email');--}}

{{--        $('#edit-id').val(id);--}}
{{--        $('#edit-id_number').val(id_number);--}}
{{--        $('#edit-name').val(name);--}}
{{--        $('#edit-position').val(position);--}}
{{--        $('#edit-email').val(email);--}}
{{--        const rolesData = button.data('rolesid');--}}
{{--        const con_rolesData = rolesData.toString();--}}
{{--        const rolesArray = con_rolesData.split(',').map(id => parseInt(id.trim()));--}}
{{--        var roles = @json($roles); // Passing the roles data from Blade--}}

{{--        $(document).ready(function() {--}}
{{--            $('#roles').bootstrapDualListbox({--}}
{{--                nonSelectedListLabel: 'Available Roles',--}}
{{--                selectedListLabel: 'Selected Roles'--}}
{{--            });--}}

{{--            // Clear existing options and then append new ones--}}
{{--            $('#roles').empty(); // Clear existing options--}}

{{--            var options = '';--}}
{{--            roles.forEach(function(role) {--}}
{{--                if (rolesArray.includes(role.id)) {--}}
{{--                    options += `<option value="${role.id}" selected>${role.name}</option>`;--}}
{{--                } else {--}}
{{--                    options += `<option value="${role.id}">${role.name}</option>`;--}}
{{--                }--}}
{{--            });--}}

{{--            $('#roles').append(options);--}}

{{--            // Refresh the Dual List Box--}}
{{--            $('#roles').bootstrapDualListbox('refresh');--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
