@include('partials.landing.header') 
    <div class="content-wrapper">
        <section id="1" class="hero image">
            @include('partials.landing.sidenav') 
        </section>
        <section id="2" class="bg-gray">
            <div class="container ptb-100">
                <div class="row gutter">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div id="services" class="owl-carousel width-100 max-width">
                            <div class="item">
                                <img src="{{ asset('/img/HEROES-LOUNGE-3.jpg') }}">
                            </div>
                        </div>
                        <div class="service-desc">
                            <h1 class="h3-size text-white text-uppercase">heroes lounge</h1>
                            <div class="editable-text text-white">
                                <p>With the support of the Manila International Airport Authority (MIAA) and the Civil Aviation Authority of the Philippines (CAAP), PAGSS operates dedicated Heroes Lounges at the following locations, for the benefit of all uniformed personnel of the Armed Forces of the Philippines (AFP), the Philippine Coast Guard (PCG) and the Philippine National Police (PNP):<br></p>
                                <ul>
                                    <li>NAIA Terminal 3</li>
                                    <li>Davao International Airport</li>
                                    <li>Laguindingan Airport</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </section>
@include('partials.landing.footer') 