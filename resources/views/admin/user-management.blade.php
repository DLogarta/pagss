    @include('partials.header')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Management</h1>
                    </div>
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
                                <table id="example2" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Employee</th>
                                            <th>Access</th>
                                            <th>Last active</th>
                                            <th>Date added</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="user-panel d-flex">
                                                    <div class="image">
                                                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        <p class="d-block mb-0">Alexander Pierce</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Admin Panel</span>
                                                <span class="badge badge-warning">IT & Support</span>
                                                <span class="badge badge-danger">HR & Employee Services</span>
                                                <span class="badge badge-info">Admin & Operations</span>
                                            </td>
                                            <td class="align-middle">March 4, 2024</td>
                                            <td class="align-middle">July 4, 2022</td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm mx-1" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Employee</th>
                                            <th>Access</th>
                                            <th>Last active</th>
                                            <th>Date added</th>
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
    </div>
@include('partials.footer')
<script>
$(function () {
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "targets": -1 } // Disable sorting on the last column
        ]
    });
});
</script>