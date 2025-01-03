@include('partials.landing.header') 
    <div class="content-wrapper">
        <section id="1" class="hero screen-height image">
            <img class="hero-image" src="{{ asset('/img/contact-bg.jpg') }}">
            @include('partials.landing.sidenav') 
            <div class="page-info">
                <h1>contact us</h1>
            </div>
        </section>
        <section id="2" class="mx-5 my-5 px-lg-5 px-md-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" placeholder="Phone Number">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <textarea class="form-control-lg form-control" placeholder="Enter your message here" rows="10"></textarea>
                    </div>
                </div>
                <button class="btn btn-primary cta-btn-reverse mt-0" type="submit">submit</button>
            </div>
        </section>
        <section id="3" class="mx-5 my-5 px-lg-5 px-md-0"><hr class="hr-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pb-3">
                        <h2 class="h3-size color-gray text-uppercase">recruitment</h2>
                        <h2 class="h4-size color-gray text-uppercase">telephone:&nbsp;<span>+63 2 8545734<br></span></h2>
                        <h2 class="h4-size color-gray text-uppercase">phone:&nbsp;<span>+63 960324540<br></span></h2>
                        <h2 class="h4-size color-gray text-uppercase">Email:&nbsp;<span class="text-lowercase">recruitment@pagssinc.com<br></span></h2>
                    </div>
                    <div class="col-md-6 pb-3">
                        <h2 class="h3-size color-gray text-uppercase">keep in touch</h2>
                        <h2 class="h4-size color-gray text-uppercase">head office:&nbsp;<span class="text-capitalize">3rd floor, PAIR-PAGS Center,Ninoy Aquino International Airport,Pasay City<br></span></h2>
                        <h2 class="h4-size color-gray text-uppercase">tel #:&nbsp;<span>+63 2 8545730 | +63 2 8545731<br></span></h2>
                        <h2 class="h4-size color-gray text-uppercase">Email:&nbsp;<span class="text-lowercase">marketing@pagssinc.com<br></span></h2>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 class="h4-size color-gray text-uppercase">applicaton form</h4><hr class="hr-gray">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label class="form-label h6-size color-gray text-uppercase mb-0">first name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label h6-size color-gray text-uppercase mb-0">last name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label class="form-label h6-size color-gray text-uppercase mb-0">desired position</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label h6-size color-gray text-uppercase mb-0">email address</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label class="form-label h6-size color-gray text-uppercase mb-0">message</label>
                                        <textarea class="form-control-lg form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label class="form-label h6-size color-gray text-uppercase mb-0">your cv here</label>
                                        <input type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-self-center">
                                    <button class="btn btn-primary cta-btn-reverse mt-0" type="submit">submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('partials.landing.footer')