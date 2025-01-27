    @include('partials.header')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Permission Management</li>
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
                            <div class="card-header">
                                <h3 class="card-title mb-0">Permission Management</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addPermissionModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-capitalize">Permission Name</th>
                                            <th class="text-capitalize">Description</th>
                                            <th class="text-capitalize">Pages Allowed</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-capitalize">Permission Name</th>
                                            <th class="text-capitalize">Description</th>
                                            <th class="text-capitalize">Pages Allowed</th>
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

        <div class="modal fade" id="addPermissionModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="/permission-management/add" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add Permission Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label class="mb-0" for="name">Permission Name:</label>
                            <input class="text-capitalize form-control mb-2" type="text" name="name" required>
                            <label class="mb-0" for="name">Permission Description:</label>
                            <input class="text-capitalize form-control mb-2" type="text" name="description" required>
                            <label for="name">Site Pages Allowed:</label><br>
                            <div class="mb-2">
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="t-admin-panel-tab" data-toggle="pill" href="#t-admin-panel" role="tab" aria-controls="t-admin-panel" aria-selected="true">Admin Panel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="t-it-and-support-tab" data-toggle="pill" href="#t-it-and-support" role="tab" aria-controls="t-it-and-support" aria-selected="false">IT & Support</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="t-content-moderation-tab" data-toggle="pill" href="#t-content-moderation" role="tab" aria-controls="t-content-moderation" aria-selected="false">Content Moderation</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade show active" id="t-admin-panel" role="tabpanel" aria-labelledby="t-admin-panel-tab">
                                            <div>
                                                <label for="" class="mb-0">User Management</label>
                                                <div class="d-flex mb-2">
                                                    <div class="mx-3">
                                                        <input type="checkbox" id="user-management" name="permissions[]" value="user-management">
                                                        <label for="user-management">Users</label>
                                                    </div>
                                                    <div class="mx-3">
                                                        <input type="checkbox" id="role-management" name="permissions[]" value="role-management">
                                                        <label for="role-management">Roles</label>
                                                    </div>
                                                    <div class="mx-3">
                                                        <input type="checkbox" id="permission-management" name="permissions[]" value="permission-management">
                                                        <label for="permission-management">Permissions</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="" class="mb-0">User Analytics</label>
                                                <div class="d-flex mb-2">
                                                    <div class="mx-3">
                                                        <input type="checkbox" id="user-activity-reports" name="permissions[]" value="user-activity-reports">
                                                        <label for="user-activity-reports">User Activity Reports</label>
                                                    </div>
                                                    <!-- <div class="mx-3">
                                                        <input type="checkbox" id="" name="permissions[]" value="">
                                                        <label for="">Content Engagement Metrics</label>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="t-it-and-support" role="tabpanel" aria-labelledby="t-it-and-support-tab">
                                            <div class="mb-2">
                                                <input type="checkbox" id="" name="permissions[]" value="it-helpdesk">
                                                <label for="">IT Helpdesk</label>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="t-content-moderation" role="tabpanel" aria-labelledby="t-content-moderation-tab">
                                            <div class="mb-2">
                                                <input type="checkbox" id="c-about-us" name="permissions[]" value="c-about-us">
                                                <label for="c-about-us">About Us</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" id="c-people" name="permissions[]" value="c-people">
                                                <label for="c-people">People</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" id="c-clients" name="permissions[]" value="c-clients">
                                                <label for="c-clients">Clients</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Permission</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editPermissionModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="/permission-management/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Role Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" id="edit-id" name="id" hidden required>
                            <label class="mb-0" for="name">Permission Name:</label>
                            <input class="text-capitalize form-control mb-2" type="text" name="name" id="edit-name" required>
                            <label class="mb-0" for="name">Permission Description:</label>
                            <input class="text-capitalize form-control mb-2" type="text" name="description" id="edit-description" required>
                            <label for="name">Site Pages Allowed:</label><br>
                            <div class="mb-2">
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab-edit" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="t-admin-panel-tab-edit" data-toggle="pill" href="#t-admin-panel-edit" role="tab" aria-controls="t-admin-panel-edit" aria-selected="true">Admin Panel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="t-it-and-support-tab-edit" data-toggle="pill" href="#t-it-and-support-edit" role="tab" aria-controls="t-it-and-support-edit" aria-selected="false">IT & Support</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="t-content-moderation-tab-edit" data-toggle="pill" href="#t-content-moderation-edit" role="tab" aria-controls="t-content-moderation-edit" aria-selected="false">Content Moderation</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent-edit">
                                        <div class="tab-pane fade show active" id="t-admin-panel-edit" role="tabpanel" aria-labelledby="t-admin-panel-tab-edit">
                                            <div>
                                                <label for="" class="mb-0">User Management</label>
                                                <div class="d-flex mb-2">
                                                    <div class="mx-3">
                                                        <input class="page-checkbox" type="checkbox" id="user-management-edit" name="permissions[]" value="user-management">
                                                        <label for="user-management-edit">Users</label>
                                                    </div>
                                                    <div class="mx-3">
                                                        <input class="page-checkbox" type="checkbox" id="role-management-edit" name="permissions[]" value="role-management">
                                                        <label for="role-management-edit">Roles</label>
                                                    </div>
                                                    <div class="mx-3">
                                                        <input class="page-checkbox" type="checkbox" id="permission-management-edit" name="permissions[]" value="permission-management">
                                                        <label for="permission-management-edit">Permissions</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="" class="mb-0">User Analytics</label>
                                                <div class="d-flex mb-2">
                                                    <div class="mx-3">
                                                        <input class="page-checkbox" type="checkbox" id="user-activity-reports-edit" name="permissions[]" value="user-activity-reports">
                                                        <label for="user-activity-reports-edit">User Activity Reports</label>
                                                    </div>
                                                    <!-- <div class="mx-3">
                                                        <input type="checkbox" id="" name="permissions[]" value="">
                                                        <label for="">Content Engagement Metrics</label>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="t-it-and-support-edit" role="tabpanel" aria-labelledby="t-it-and-support-tab-edit">
                                            <div class="mb-2">
                                                <input class="page-checkbox" type="checkbox" id="it-helpdesk-edit" name="permissions[]" value="it-helpdesk">
                                                <label for="">IT Helpdesk</label>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="t-content-moderation-edit" role="tabpanel" aria-labelledby="t-content-moderation-tab-edit">
                                            <div class="mb-2">
                                                <input class="page-checkbox" type="checkbox" id="c-about-us-edit" name="permissions[]" value="c-about-us">
                                                <label for="c-about-us-edit">About Us</label>
                                            </div>
                                            <div class="mb-2">
                                                <input class="page-checkbox" type="checkbox" id="c-people-edit" name="permissions[]" value="c-people">
                                                <label for="c-people-edit">People</label>
                                            </div>
                                            <div class="mb-2">
                                                <input class="page-checkbox" type="checkbox" id="c-clients-edit" name="permissions[]" value="c-clients">
                                                <label for="c-clients-edit">Clients</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                                </div>
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
            autoWidth: false,
            responsive: true,
            columnDefs: [
                { "orderable": false, "targets": -1 }, // Disable sorting on the last column
                { width: "1%", targets: -1 }
            ],
            ajax: {
                url: '/permission-management/data',
                type: 'GET'
            },
            columns: [
                { data: 'name', className: 'align-middle text-capitalize' },
                { data: 'description', className: 'align-middle text-capitalize' },
                {
                    data: 'pages',
                    className: 'align-middle',
                    render: function(data) {
                        if (Array.isArray(data)) {
                            return data.join(', ');
                        }
                        return data; // Fallback for unexpected data
                    }
                },
                {
                    data: 'id',
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex">
                                <button type="button" class="btn btn-info btn-sm mx-1" data-toggle="modal" data-target="#editPermissionModal"
                                        data-id="${data}" data-name="${row.name}" data-description="${row.description}" data-pages="${row.pages}">
                                        <i class="fas fa-pencil-alt"></i>
                                </button>
                                <form method="POST" action="/permission-management/delete" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this permission?');">
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
    $('#editPermissionModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget); // Button that triggered the modal
        const id = button.data('id');
        const name = button.data('name');
        const description = button.data('description');
        const pages = button.data('pages');

        // Populate the modal fields
        $('#edit-id').val(id);
        $('#edit-name').val(name);
        $('#edit-description').val(description);
        $('.page-checkbox').prop('checked', false); // Uncheck all first
        if (pages) {
            const pagesArray = pages.split(', '); // Split the string into an array
            pagesArray.forEach(page => {
                $(`.page-checkbox[value="${page}"]`).prop('checked', true);
            });
        }
    });
</script>
