@include('partials.landing.header') 
    <div class="content-wrapper">
        <section id="1" class="hero screen-height image">
            <img class="hero-image" src="{{ asset('/img/services%20(1).jpg') }}">
            @include('partials.landing.sidenav') 
            <div class="page-info">
                <h1>operations</h1>
            </div>
        </section>
        <section id="2" class="services-list px-3">
            <div class="container">
                <h1 class="h1-size color-gray text-uppercase">Our services</h1>
                <div class="editable-text pb-1">
                    <p>PAGSS continues to handle the largest market share in MNL ground handling operations.</p>
                </div>
                <div class="owl-carousel">
                    <div class="item">
                        <a class="text-decoration-none" href="service"><img src="{{ asset('/img/PASSENGER-HANDLING-4.jpg') }}">
                            <div class="service-description">
                                <h5>Passenger Handling</h5>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a class="text-decoration-none" href="service"><img src="{{ asset('/img/5-2.jpg') }}">
                            <div class="service-description">
                                <h5>Passenger Handling</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
@include('partials.landing.footer') 