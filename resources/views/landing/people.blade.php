@include('partials.landing.header') 

    <div class="content-wrapper">
        <section id="1" class="hero image">
            @include('partials.landing.sidenav') 
        </section>
        <section id="2" class="bg-gray pt-100">
            <div class="d-flex flex-column justify-content-center align-items-center pb-5 mx-4">
                <h3 class="h3-size text-uppercase text-white text-center">organization</h3>
                <div class="editable-text text-white text-center">
                    <p>PAGSS takes pride in its people—all well trained, highly qualified and hardworking individuals who take our Company’s Mission to heart.<br></p>
                </div>
            </div>
        </section>
        <section id="3" class="bg-gray p-0">
            <div class="d-flex flex-column justify-content-center align-items-center pb-5">
                <h3 class="h3-size text-uppercase color-gold fw-normal spacing-05 text-center">executive officers</h3>
                <div class="card-container">
                    <div class="card-holder"></div>
                    <div class="container px-5">
                        <div class="row justify-content-center gutter">
                            @foreach ($people->where('category', 'executive') as $person)
                                <div class="col-md-4 col-lg-3 ptb-card">
                                    <img class="img-fluid" src="{{ asset('/img/organization/' . $person->image) }}">
                                    <div class="card-desc text-center">
                                        <h3 class="text-uppercase fw-normal h4-size spacing-05 color-gold mb-0">{{ $person->name }}</h3>
                                        <p class="text-white text-uppercase mb-0 font-14">{{ $person->title }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="4" class="bg-gray pb-100 pt-0">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3 class="h3-size text-uppercase color-gold fw-normal spacing-05 text-center">managers</h3>
                <div class="card-container">
                    <div class="card-holder"></div>
                    <div class="container px-5">
                        <div class="row justify-content-center gutter">
                            @foreach ($people->where('category', 'manager') as $person)
                                <div class="col-md-4 col-lg-4 ptb-card">
                                    <img class="img-fluid" src="{{ asset('/img/organization/' . $person->image) }}">
                                    <div class="card-desc text-center">
                                        <h3 class="text-uppercase fw-normal h4-size spacing-05 color-gold mb-0">{{ $person->name }}</h3>
                                        <p class="text-white text-uppercase mb-0 font-14">{{ $person->title }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('partials.landing.footer') 