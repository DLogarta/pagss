    @include('partials.header')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Activity Reports</li>
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
                                    <h5>User Activity Reports</h5>
                                    <!-- <button type="button" class="btn btn-info btn-sm mx-1 mb-1" data-toggle="modal" data-target="#addRoleModal">
                                            <i class="fas fa-plus"></i> Add New Role
                                    </button> -->
                                </div>
                                <table id="example2" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-capitalize">No.</th>
                                            <th class="text-capitalize">Date</th>
                                            <th class="text-capitalize">Author</th>
                                            <th class="text-capitalize">Action</th>
                                            <th class="text-capitalize">Description</th>
                                            <th class="text-capitalize">IP Address</th>
                                            <th class="text-capitalize">User Agent</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-capitalize">No.</th>
                                            <th class="text-capitalize">Date</th>
                                            <th class="text-capitalize">Author</th>
                                            <th class="text-capitalize">Action</th>
                                            <th class="text-capitalize">Description</th>
                                            <th class="text-capitalize">IP Address</th>
                                            <th class="text-capitalize">User Agent</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
            ajax: {
                url: '/user-activity-reports/data',
                type: 'GET'
            },
            order: [[0, 'desc']],
            columns: [
                { data: 'id', className: 'align-middle text-capitalize' },
                {
                    data: 'created_at',
                    className: 'align-middle text-capitalize',
                    render: function(data, type, row) {
                        if (data) {
                            const date = new Date(data);

                            const options = { month: 'long' };
                            const month = new Intl.DateTimeFormat('en-US', options).format(date);
                            const day = date.getDate();
                            const year = date.getFullYear();

                            const hours = date.getHours();
                            const minutes = date.getMinutes().toString().padStart(2, '0');
                            const seconds = date.getSeconds().toString().padStart(2, '0');
                            const ampm = hours >= 12 ? 'PM' : 'AM';
                            const formattedHour = (hours % 12 || 12);

                            return `${month} ${day}, ${year} | ${formattedHour}:${minutes}:${seconds} ${ampm}`;
                        }
                        return 'N/A';
                    }
                },
                {
                    data: 'name', className: 'align-middle',
                    render: function (data, type, row) {
                        return `
                            <div class="user-panel d-flex">
                                <div class="image">
                                    <img src="/img/users/${row.pfp}" class="img-circle elevation-2" alt="User Image">
                                </div>
                                <div class="info">
                                    <p class="d-block mb-0 text-capitalize">${data}</p>
                                </div>
                            </div>`;
                    }
                },
                { data: 'activity_type', className: 'align-middle text-capitalize' },
                { data: 'activity_details', className: 'align-middle', style: 'td:first-letter: text-transform-uppercase;' },
                { data: 'ip_address', className: 'align-middle text-capitalize' },
                { data: 'user_agent', className: 'align-middle text-capitalize' },
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
