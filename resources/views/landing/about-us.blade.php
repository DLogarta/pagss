@include('partials.landing.header') 
    <div class="content-wrapper">
        <section id="1" class="hero screen-height image">
            <img class="hero-image" src="{{ asset('/img/aboutus.jpg') }}">
            @include('partials.landing.sidenav') 
            <div class="page-info">
                <h1>about us</h1>
            </div>
        </section>
        <section id="2" class="my-5 mx-3">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-6 align-self-center">
                        <img class="img-fluid img-shadow" src="{{ asset('/img/history.jpg') }}">
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="pb-3 bottom-line">
                            <h1 class="h1-size color-gray text-uppercase">WHO WE ARE</h1>
                            <div class="editable-text font-16 color-gray text-justify">
                                <p>PAGSS is the leading ground handling company in the Philippines. We are backed by 28 years of experience in providing first-rate ground handling services to international airlines landing and taking-off at various international airports in the Philippines.</p>
                                <p>PAGSS traces its roots to a joint venture between Lufthansa Airport and Ground Services GmbH (LAGS) and People’s Air Cargo &amp; Warehousing Co., Inc. (PAIRCARGO) called Philippine Airport and Ground Services, Inc. (PAGS), which was established as a ground handling company at the Ninoy Aquino International Airport (NAIA) in 1996. Since 2010, PAGSS has been a wholly owned subsidiary of PAIRCARGO.</p>
                                <p>From a single airline client at the start of its ground handling operations, today, PAGSS operates at eight (8) international airports throughout the Philippines and is the designated ground handler of over 30 international airlines.</p>
                                <p>PAGSS is principally based at NAIA but is also positioned to provide ground handling services at:</p>
                                <ul>
                                    <li>Mactan-Cebu International Airport (CEB)<br></li>
                                    <li>Kalibo International Airport (KLO)<br></li>
                                    <li>Clark International Airport (CRK)<br></li>
                                    <li>Francisco Bangoy International Airport (DVO)<br></li>
                                    <li>Puerto Princesa International Airport (PPS)<br></li>
                                    <li>Iloilo International Airport (ILO)<br></li>
                                </ul>
                                <p>Our services encompass passenger handling, cargo and mail handling, ramp handling and ground operations, flight operations, and passenger lounge operations, all customized and fine-tuned to serve our clients’ individual needs and requirements.</p>
                                <p>It is our objective to provide high-quality ground handling services at all times, ensuring full and efficient compliance with all applicable international requirements and standards. PAGSS is part of the IATA Safety Audit for Ground Operations (ISAGO) Registry and is RA3 certified (Third Country EU Aviation Security Validated Regulated Agent).<br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="3" class="my-5 mx-3">
            <div class="container">
                <div class="row gy-4 reverse">
                    <div class="col-md-6 align-self-center">
                        <div class="pb-3 bottom-line">
                            <h1 class="h1-size color-gray text-uppercase">what we do</h1>
                            <div class="editable-text font-16 color-gray text-justify">
                                <p>PAGSS provides ground handling services for airlines at various airports in the Philippines, including at the Philippines’ main gateway, the Ninoy Aquino International Airport (NAIA). Our unparalleled level of service has made us the market leader at NAIA.<br></p>
                                <p>Our services comprise passenger handling, cargo and mail handling, ramp handling and ground operations, flight operations, and passenger lounge operations.<br></p>
                                <p>Our operational departments ensure that day-to-day airline operations are handled in an efficient and competent manner, and that all tasks and processes are always performed in a safe and secure way.<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <img class="img-fluid img-shadow" src="{{ asset('/img/mission.jpg') }}">
                    </div>
                </div>
            </div>
        </section>
        <section id="4" class="my-5 mx-3">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-6 align-self-center">
                        <img class="img-fluid img-shadow" src="{{ asset('/img/services.jpg') }}">
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="pb-3 bottom-line">
                            <h1 class="h1-size color-gray text-uppercase">mission</h1>
                            <div class="editable-text font-16 color-gray text-justify">
                                <p>It is our paramount mission to deliver world-class ground handling services to our airline clients, and do our part in ensuring the safety and convenience of the travelling public.<br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('partials.landing.footer')