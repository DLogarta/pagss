@include('partials.landing.header') 
    <div class="content-wrapper">
        <section id="1" class="hero screen-height">
            <video class="hero-video" autoplay="" loop="" preload="auto" muted="" poster="https://pagssinc.com/wp-content/themes/pagss/clients-video-screenshot.jpg">
                <source src="https://pagssinc.com/wp-content/themes/pagss/clients-video-banner.mp4" type="video/mp4">
            </video>
            @include('partials.landing.sidenav') 
            <div class="page-info">
                <h1>clients</h1>
            </div>
        </section>
        <section id="2" class="bg-gray">
            <div class="d-flex flex-column justify-content-center align-items-center pt-5 pb-5 mx-4">
                <h3 class="h3-size text-uppercase text-white text-center spacing-05 fw-normal">
                    <strong>Our Airline Partners</strong><br>
                </h3>
                <div class="editable-text text-white text-center">
                    <p>PAGSS provides a wide and varied range of ground handling services to over 30 international airlines operating in the Philippines.<br></p>
                </div>
            </div>
        </section>
        <section id="3">
            <div class="container px-md-5 py-5 px-sm-3 px-xs-2">
                <div class="row justify-content-center gutter">
                    @foreach($clients as $client)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 align-self-center ptb-client">
                            <img class="img-fluid" src="{{ asset('/img/clients/' . $client->image) }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
@include('partials.landing.footer') 