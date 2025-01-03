@include('partials.landing.header') 
    <div class="content-wrapper">
        <section id="1" class="hero screen-height">
            <video class="hero-video" autoplay="" loop="" preload="auto" muted="" poster="https://pagssinc.com/wp-content/uploads/2020/01/pagss-screenshot.jpg">
                <source src="https://pagssinc.com/wp-content/themes/pagss/pagss-new-vid.mp4" type="video/mp4">
            </video>
            @include('partials.landing.sidenav') 
        </section>
        <section id="2" class="section-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-entry">
                        <div data-aos="fade-left" data-aos-once="true" id="googleMap" class="map-entry"></div>
                    </div>
                    <div class="col-md-6 right-entry">
                        <div class="info-entry">
                            <h2 data-aos="fade-right" data-aos-once="true" class="h2-size m-32">WHO WE ARE</h2>
                            <p data-aos="fade-right" data-aos-delay="200" data-aos-once="true" class="font-18">PAGSS is the leading ground handling company in the Philippines. We are backed by 28 years of experience in providing first-rate ground handling services to international airlines landing and taking-off at various international airports in the Philippines.<br></p>
                            <p data-aos="fade-right" data-aos-delay="250" data-aos-once="true" class="font-18">PAGSS traces its roots to a joint venture between Lufthansa Airport and Ground Services GmbH (LAGS) and People’s Air Cargo &amp; Warehousing Co., Inc. (PAIRCARGO) called Philippine Airport and Ground Services, Inc. (PAGS), which was established as a ground handling company at the Ninoy Aquino International Airport (NAIA) in 1995. Since 2010, PAGSS has been a wholly owned subsidiary of PAIRCARGO.<br></p>
                            <a class="btn cta-btn" href="#">view more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="3" class="section-3">
            <div class="container max-width">
                <div class="row reverse">
                    <div class="col-md-6">
                        <div class="left-section-3">
                            <h4 data-aos="fade-left" class="text-uppercase h4-size color-gold text-center">what we offer</h4>
                            <h2 class="text-uppercase h2-size color-gray text-center" data-aos="fade-left">services</h2>
                            <ul class="max">
                                <li data-aos="fade-left" class="font-18">Passenger Handling</li>
                                <li data-aos="fade-left" class="font-18">PAGSS Premium Lounge</li>
                                <li data-aos="fade-left" class="font-18">PAGSS Premium Lounge</li>
                                <li data-aos="fade-left" class="font-18">Heroes Lounge</li>
                                <li data-aos="fade-left" class="font-18">Flight Operations</li>
                                <li data-aos="fade-left" class="font-18">Ground Handling</li>
                                <li data-aos="fade-left" class="font-18">Cargo and Mail Handling</li>
                            </ul>
                            <a class="btn cta-btn-reverse" href="#">view more</a>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center max max-width">
                        <div class="width-100">
                            <img class="img-fluid width-100" src="{{ asset('/img/about-us-homepage.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="4" class="section-4">
            <div class="container max-width">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center align-items-center max max-width">
                        <div class="width-100">
                            <img class="img-fluid width-100" src="{{ asset('/img/careeredited.jpg') }}" style="background-image: url(assets/img/mountain_bg.jpg);background-position: center;background-size: cover;">
                        </div>
                    </div>
                    <div class="col-md-6 max">
                        <div class="left-section-3">
                            <h4 data-aos="fade-right" class="text-uppercase h4-size color-gold text-center">join our growing team</h4>
                            <h2 class="text-uppercase h2-size color-gray text-center" data-aos="fade-right">careers</h2>
                            <p data-aos="fade-right" data-aos-delay="200" class="text-center max font-18">Check the latest career opportunities at PAGSS. You are welcome to visit our site and apply using our online application form.<br></p>
                            <a class="btn cta-btn-reverse" href="#">view more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('partials.landing.footer') 