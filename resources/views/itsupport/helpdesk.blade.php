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
                            <div class="card-header">
                                <h3 class="card-title mb-0">Helpdesk Tickets</h3>
                            </div>
                            <div class="card-body">
                                <table id="example3" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-capitalize">Ticket #</th>
                                            <th class="text-capitalize">Name</th>
                                            <th class="text-capitalize">Concern</th>
                                            <th class="text-capitalize">Priority Level</th>
                                            <th class="text-capitalize">Created At</th>
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
                                            <th class="text-capitalize">Created At</th>
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

        <div class="modal fade" id="viewTicket">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form action="/it-helpdesk/update" method="POST" id="helpdesk-form">
                        @csrf
                        <input type="hidden" name="reason" id="edit-reason">
                        <div class="modal-header">
                            <h5 class="modal-title"><span class="text-uppercase" id="ticket-id">Ticket #</span> | <span class="text-capitalize" id="reporter-name">Name</span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="mb-0">Ticket Number:</label>
                                    <input class="text-uppercase form-control mb-2" type="text" id="edit-ticket_number" name="id" required readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Location:</label>
                                    <input class="text-capitalize form-control mb-2" type="text" id="edit-location" name="location" required readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Concern:</label>
                                    <input class="text-capitalize form-control mb-2" type="text" id="edit-subject" name="subject" required readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="mb-0">Reporter Name:</label>
                                    <input class="text-capitalize form-control mb-2" type="text" id="edit-name" name="name" required readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Employee ID Number:</label>
                                    <input class="text-uppercase form-control mb-2" type="text" id="edit-id_number" name="id_number" required readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Phone:</label>
                                    <input class="form-control mb-2" type="text" id="edit-phone" name="phone" required readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Email:</label>
                                    <input class="form-control mb-2" type="text" id="edit-email" name="email" required readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Description:</label>
                                    <textarea class="form-control mb-2" style="height:250px" id="edit-description" name="description" required readonly></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>Photo/Images:</label>
                                    <div id="report" class="owl-carousel">
                                        <div class="item d-flex justify-content-center">
                                            <p>No image submitted for this report.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div>
                                <button type="submit" name="action" value="mark_fake" class="btn btn-danger">Mark as Fake</button>
                                <button type="submit" name="action" value="respond" class="btn btn-primary">Respond</button>
                                <button type="submit" name="action" value="undo" class="btn btn-danger">Undo</button>
                                <button type="button" id="delete" onclick="promptDelete()" class="btn btn-danger">Delete</button>
                                <button type="submit" name="action" value="done" class="btn btn-primary">Done</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('partials.footer')
<script>
    $('#example3').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        columnDefs: [
            { "orderable": false, "targets": -1 }, // Disable sorting on the last column
            { width: "1%", targets: -1 }
        ],
        order: [[4, 'desc']], // Default sorting by the 'created_at' column (index 4) in descending order
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
                        case 'Low': badgeClass = 'badge-info'; break;
                        case 'Medium': badgeClass = 'badge-success'; break;
                        case 'High': badgeClass = 'badge-warning'; break;
                        case 'Critical': badgeClass = 'badge-danger'; break;
                        default: badgeClass = 'badge-secondary'; break;
                    }
                    return `<span class="badge ${badgeClass}">${data}</span>`;
                }
            },
            {
                data: 'created_at',
                className: 'align-middle text-capitalize',
                render: function (data, type, row) {
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
                data: 'status',
                render: function (data, type, row) {
                    let badgeClass = '';
                    let badgeContent = '';
                    switch (data) {
                        case 'Ongoing':
                            badgeClass = 'badge-info';
                            badgeContent = `Ongoing: Assigned to <span class="text-capitalize">${row.responder}</span>`;
                            break;
                        case 'Resolved':
                            badgeClass = 'badge-success';
                            badgeContent = `Resolved: Resolved by <span class="text-capitalize">${row.responder}</span>`;
                            break;
                        case 'Pending':
                            badgeClass = 'badge-warning';
                            badgeContent = `Pending`;
                            break;
                        case 'Fake':
                            badgeClass = 'badge-danger';
                            badgeContent = `Fake: Tagged by <span class="text-capitalize">${row.responder}</span>`;
                            break;
                        case 'Archived':
                            badgeClass = 'badge-danger';
                            badgeContent = `Archived: Tagged by <span class="text-capitalize">${row.responder}</span>`;
                            break;
                        default:
                            badgeClass = 'badge-warning';
                            badgeContent = `Pending`;
                            break;
                    }
                    return `<span class="badge ${badgeClass}">${badgeContent}</span>`;
                }
            },
            {
                data: 'id',
                render: function (data, type, row) {
                    return `
                    <div class="d-flex">
                        <button type="button" class="btn btn-info btn-sm mx-1" data-toggle="modal" data-target="#viewTicket"
                                data-id="${data}" data-name="${row.name}" data-id_number="${row.id_number}" data-phone="${row.phone}" data-email="${row.email}" data-subject="${row.subject}" data-description="${row.description}" data-priority_level="${row.priority_level}" data-status="${row.status}" data-attachments="${row.attachments}" data-assigned_to="${row.assigned_to}" data-created="${row.created_at}" data-location="${row.location}">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                `;
                }
            }
        ]
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
    $('#viewTicket').on('show.bs.modal', function (event) {
        $('#report').trigger('destroy.owl.carousel');

        const button = $(event.relatedTarget);
        const id = button.data('id');
        const name = button.data('name');
        const id_number = button.data('id_number');
        const phone = button.data('phone');
        const email = button.data('email');
        const subject = button.data('subject');
        const description = button.data('description');
        const attachments = button.data('attachments');
        const status = button.data('status');
        const location = button.data('location');

        $('#ticket-id').text(id);
        $('#edit-subject').val(subject);
        $('#reporter-name').text(name);
        $('#edit-ticket_number').val(id);
        $('#edit-name').val(name);
        $('#edit-id_number').val(id_number);
        $('#edit-phone').val(phone);
        $('#edit-email').val(email);
        $('#edit-description').val(description);
        $('#edit-location').val(location);
        const carousel = document.getElementById('report');
        carousel.innerHTML = attachments.map(attachment => `
            <div class="item d-flex justify-content-center">
                <img style="height:250px; width:auto!important;" src="/img/helpdesk/${attachment}" alt="${attachment}">
            </div>
        `).join(''); // Generate HTML content for each attachment

        $("#report").owlCarousel({
            loop: true,
            margin: 10,
            center: true,
            autoplay: true,
            autoplayTimeout: 3000,
            items: 1,
        });

        // Button visibility logic
        const markFakeBtn = $('button[name="action"][value="mark_fake"]');
        const respondBtn = $('button[name="action"][value="respond"]');
        const undoBtn = $('button[name="action"][value="undo"]');
        const deleteBtn = $('#delete');
        const doneBtn = $('button[name="action"][value="done"]');

        // Hide all buttons by default
        markFakeBtn.hide();
        respondBtn.hide();
        undoBtn.hide();
        deleteBtn.hide();
        doneBtn.hide();

        // Show buttons based on status
        switch (status) {
            case 'Pending':
                markFakeBtn.show();
                respondBtn.show();
                break;
            case 'Ongoing':
                deleteBtn.show();
                doneBtn.show();
                break;
            case 'Fake':
                undoBtn.show();
                break;
            case 'Resolved':
                // Default 'Close' button remains visible
                break;
            case 'Archived':
                undoBtn.show();
                break;
            default:
                // Handle unknown status if necessary
                break;
        }
    });
</script>
<script>
    function promptDelete() {
        const reason = prompt("Please provide a reason for deletion:");
        if (reason) {
            document.getElementById('edit-reason').value = reason;
            const form = document.getElementById('helpdesk-form');
            const deleteButton = document.createElement('input');
            deleteButton.type = 'hidden';
            deleteButton.name = 'action';
            deleteButton.value = 'delete';
            form.appendChild(deleteButton);
            form.submit();
        } else {
            alert("Deletion canceled. Reason is required.");
        }
    }
</script>
