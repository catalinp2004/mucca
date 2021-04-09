@include("partials/_head")

<body>

<div class="page-wrapper container-fluid">

    <div class="row position-relative">

        <div class="welcome-section col-12 d-flex flex-column pad-left pad-right pad-top margin-bottom">

            @include("partials/_home_nav")

            <div class="row margin-bottom" id="povestea">
                <div class="col-lg-5 col-xl-3 d-flex flex-column justify-content-between align-items-center align-items-lg-start title-col mb-5 mb-lg-0">
                    <div class="d-flex flex-column flex-fill justify-content-between align-items-center ofxh">
                        <h2 class="mt-0 mb-lg-0">Povestea</h2>
                        <div data-aos="fade-right" data-aos-duration="500" data-aos-offset="250">
                            <img src="{{ asset('img/arrow_down.png') }}" srcset="{{ asset('img/arrow_down.svg') }} 1x" alt="arrow-down" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-8 offset-xl-1 d-flex flex-column justify-content-between info-col margin-top mt-lg-0">
                    <h3>Mucca e o văcuță.</h3>
                    <p>Am căutat un nume pentru ea și am dat de Mucca. Am vrut un logo coolish și a ieșit Mucca cu ochelari de soare. Am vrut să ne axăm pe producție publicitară și ne-am dat seama că ne place maxim diversitatea. Ne place și complexitatea pentru că ne pune mintea la contribuție, ne place frumosul pentru că ne face să zâmbim, ne place calitatea pentru că ne lasă să ne vedem de treabă și nu ne întoarce din drum, ne place munca în echipă dar și rolul de one man show. Ca să sumarizăm, Mucca este agenție de publicitate full service care se ocupă de implementarea proiectelor ce țin de producția publicitară.</p>
                    <p class="green"><strong>Cum? Unde? Ce fel de proiecte?</strong></p>
                    <p>Am menționat că ne place și eficiența? Te lămurim mult mai rapid verbal decat în scris.</p>
                    <a href="tel:+40758094410" class="p-large mb-0"><strong>Sună-ne!</strong></a>
                </div>
            </div>

        </div>

        <div class="col-12 pt-5 pad-left pad-right py-5" id="servicii">

            <div class="row margin-bottom">
                <div class="col-lg-5 col-xl-3 d-flex flex-column align-items-center align-items-lg-start title-col">
                    <h2 class="mb-0">Servicii</h2>
                </div>
                <div class="col-lg-7 col-xl-8 offset-xl-1 info-col mt-5 mt-lg-0">
                    <p>Depindem constant de munca altor oameni astfel ca suntem constienti ca si clienti nostri se bazeaza pe noi in fiecare moment. De aceea livram mereu la timp, de fiecare data mai bine si intotdeauna conform cu asteptarile clientilor nostri.</p>
                </div>
            </div>
            <div class="row pt-lg-5 margin-bottom">
                <div class="col-mb-8 offset-mb-2 col-xl-6 offset-xl-3 mb-lg-0 d-flex flex-column align-items-center">
                    <h3 class="mb-5"><strong>Playfully Committed</strong></h3>
                    <p class="text-center playfully-p">Știm însă cu toții că imprevizibilul se poate juca cu planurile noastre. Intrăm și noi în joc cu experiența și resursele pe care le avem și ne bucurăm de rezultat. De fiecare dată.</p>
                </div>
            </div>

            <div class="row pt-5">

                <div class="col-9 col-sm-10 col-xl-4 offset-xl-1 infographic order-1 ofxh">
                    <p>Te ajutăm cu definirea specificațiilor tehnice și cu experiența celor mai buni furnizori din piață.</p>
                    <div data-aos="fade-right" data-aos-duration="500" data-aos-offset="250">
                        <img src="{{ asset('img/sign_1.png') }}" srcset="{{ asset('img/sign_1.svg') }} 1x" class="img-fluid img-sign">
                    </div>
                </div>
                <div class="col-2 d-flex flex-column align-items-center position-relative order-2 infographic-sign-case">
                    <span class="number">1</span>
                    <img src="{{ asset('img/green_circle.png') }}" srcset="{{ asset('img/green_circle.svg') }} 1x" alt="green-circle" class="circle">
                    <img src="{{ asset('img/line_1.png') }}" srcset="{{ asset('img/line_1.svg') }} 1x" alt="grey-line" class="line my-auto">
                </div>

                <div class="col-2 offset-xl-5 d-flex flex-column align-items-center position-relative order-4 order-xl-3 infographic-sign-case">
                    <span class="number">2</span>
                    <img src="{{ asset('img/green_circle.png') }}" srcset="{{ asset('img/green_circle.svg') }} 1x" alt="green-circle" class="circle">
                    <img src="{{ asset('img/line_2.png') }}" srcset="{{ asset('img/line_2.svg') }} 1x" alt="grey-line" class="line my-auto">
                </div>
                <div class="col-9 col-sm-10 col-xl-4 infographic order-3 order-xl-4 ofxh">
                    <p>Oferim soluții integrate care te ajută mai ales atunci când procesul de producție este unul fragmentat.</p>
                    <div data-aos="fade-left" data-aos-duration="500" data-aos-offset="250">
                        <img src="{{ asset('img/sign_2.png') }}" srcset="{{ asset('img/sign_2.svg') }} 1x" class="img-fluid img-sign">
                    </div>
                </div>

                <div class="col-9 col-sm-10 col-xl-4 offset-xl-1 infographic order-5 ofxh">
                    <p>Propunem bugete bine detaliate și argumentate.</p>
                    <div data-aos="fade-right" data-aos-duration="500" data-aos-offset="250">
                        <img src="{{ asset('img/sign_3.png') }}" srcset="{{ asset('img/sign_3.svg') }} 1x" class="img-fluid img-sign">
                    </div>
                </div>
                <div class="col-2 d-flex flex-column align-items-center position-relative order-6 infographic-sign-case">
                    <span class="number">3</span>
                    <img src="{{ asset('img/green_circle.png') }}" srcset="{{ asset('img/green_circle.svg') }} 1x" alt="green-circle" class="circle">
                    <img src="{{ asset('img/line_1.png') }}" srcset="{{ asset('img/line_1.svg') }} 1x" alt="grey-line" class="line my-auto">
                </div>

                <div class="col-2 offset-xl-5 d-flex flex-column align-items-center position-relative order-8 order-xl-7 infographic-sign-case">
                    <span class="number">4</span>
                    <img src="{{ asset('img/green_circle.png') }}" srcset="{{ asset('img/green_circle.svg') }} 1x" alt="green-circle" class="circle">
                    <img src="{{ asset('img/line_2.png') }}" srcset="{{ asset('img/line_2.svg') }} 1x" alt="grey-line" class="line my-auto">
                </div>
                <div class="col-9 col-sm-10 col-xl-4 infographic order-7 order-xl-8 ofxh">
                    <p>Livrăm mereu la timp. De fapt mai repede, ca să stăm linistiți că ți-ai luat o grijă de pe cap.</p>
                    <div data-aos="fade-left" data-aos-duration="500" data-aos-offset="250">
                        <img src="{{ asset('img/sign_4.png') }}" srcset="{{ asset('img/sign_4.svg') }} 1x" class="img-fluid img-sign">
                    </div>
                </div>

                <div class="col-9 col-sm-10 col-xl-4 offset-xl-1 infographic order-9">
                    <p>Eficientizăm costurile evitând risipa de materiale.</p>
                </div>
                <div class="col-2 d-flex flex-column align-items-center position-relative order-10 infographic-sign-case">
                    <span class="number">5</span>
                    <img src="{{ asset('img/blue_circle.png') }}" srcset="{{ asset('img/blue_circle.svg') }} 1x" alt="blue-circle" class="circle">
                </div>

            </div>

        </div>

        <div class="col-12">
            <div class="row mb-5 ofxh">
                <div class="col-md-9 py-5 pr-4 pad-left bk-green white order-2 order-md-1">
                    <h4 class="materiale-h4">Materiale<br> publicitare și de<br> vizibilitate</h4>
                    <p><strong>Printuri?</strong> Da, digital și offset, indoor și outdoor. <br>Pe ce materiale printăm? Pe materialul pe care ni-l sugerezi tu sau pe materialul pe care-l considerăm noi mai potrivit pentru proiectul descris de tine. Îți argumentăm alegerea cu detalii tehnice și descrierea limitărilor de producție dacă ele există. <br>Da, putem face și montajul. Nu doar în București, nu doar în țară, simultan în mai multe locații dacă este necesar.</p>
                    <p><strong>Livrarea?</strong> Tot noi, dacă e în regulă cu tine.</p>
                    <p>Sisteme expoziționale, standuri? Oh, da! Așteptăm cu nerăbdare brief-ul.</p>
                </div>

                <div class="col-md-3 pt-5 mb-5 mb-md-0 d-flex justify-content-center align-items-center materiale-img order-1 order-md-2" data-aos="fade-left" data-aos-duration="500" data-aos-offset="250">
                    <img src="{{ asset('img/materials_triangle.png') }}" srcset="{{ asset('img/materials_triangle.svg') }} 1x" class="img-fluid" alt="yellow-triangle">
                </div>
            </div>
        </div>

        <div class="col-12 margin-top margin-bottom pad-left pad-right">
            <div class="row ofxh">
                <div class="col-md-3 d-flex justify-content-md-end align-items-start mb-5 mb-md-0" data-aos="fade-right" data-aos-duration="500" data-aos-offset="250">
                    <img src="{{ asset('img/arrow_right.png') }}" srcset="{{ asset('img/arrow_right.svg') }} 1x" class="img-fluid materiale-arrow" alt="green-arrow">
                </div>
                <div class="col-md-8 offset-md-1">
                    <h4 class="materiale-h4">Materiale<br> suport eveniment</h4>
                    <p>Știi momentele alea cu multă adrenalină din preziua evenimentului? Când iei pentru a n-a oara lista cu materiale și vrei să le bifezi: badge-uri nominale, lanyards, suport badge-uri, badge-uri blanc pentru orice eventualitate, tricouri staff, tricouri promoteri, plăsuțe, SWAG, materiale parteneri, sticker-e, premii, călăreți, vouchere-e, mape de presă… Dacă îți place cu adevărat adrenalina, livrăm totul în ultimul moment. Altfel, o facem relaxat și fără stres și te ajutăm la check. Dacă este ceva în neregulă, avem timp și pentru implementarea unui back-up plan.</p>
                </div>
            </div>
        </div>

        <div class="col-12 margin-top margin-bottom">
            <div class="row">
                <div class="col-xl-5 pad-left pr-5 py-2 margin-bottom">
                    <h4 class="materiale-h4">Giveaways</h4>
                    <p>Propunem item-uri plecând de la brief-ul tău, ținând cont de culorile de brand, de target și bineînțeles de buget.</p>
                    <p>Importăm materiale promoționale de catalog, facem simulări, ne ocupăm de personalizare și le livrăm acolo unde ai nevoie de ele. <br>Mixăm experiența mai multor furnizori astfel încât produsul custom la care te-ai gândit să iasă chiar mai bine decât l-ai vizualizat.</p>
                    <p>Ambalăm pachete individuale dacă este necesar și le pregătim pentru livrare, pentru ca tu să ai timp suficient pentru celelalte task-uri din to do-ul zilnic.</p>
                </div>

                <div class="col-xl-7 mt-3 mt-xl-0">
                    <div class="row">
                        <div class="col-md-6 px-0 giveaway-col">
                            <img src="{{ asset('img/giveaways_materiale.jpg')}}" class="img-fluid">
                        </div>
                        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center bk-blue giveaway-col">
                            <p class="text-center mb-5 catalog-p">Vezi cele peste 5000 de produse din catalogul nostru.</p>
                            <button class="btn btn-materiale">Go</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 my-5 pad-left pad-right">
            <div class="row ofxh">
                <div class="col-2 col-md-4 d-flex justify-content-center align-items-start justify-content-md-end align-items-md-stretch" data-aos="fade-right" data-aos-duration="500" data-aos-offset="250">
                    <img src="{{ asset('img/special_projects.png') }}" srcset="{{ asset('img/special_projects.svg') }} 1x" class="img-fluid projects-img" alt="green-brackets">
                </div>
                <div class="col-10 col-md-7 offset-md-1">
                    <h4 class="materiale-h4">Proiecte<br> speciale</h4>
                    <p class="mb-0">Imaginează-ți că ai 10 jocuri Lego diferite, fiecare cu câteva zeci de piese. Amestecă-le și încearcă să construiești ceva diferit de cele 10 construcții pe care le-ai fi putut realiza înainte de amestecare. Cam așa și cu proiectele speciale. Te provoacă să folosești toată experiența acumulată și toate resursele de care dispui pentru a obține ceva cu totul nou. Da, ne plac mult. Mai ales cele care implică testare și validare.</p>
                </div>
            </div>
        </div>

        <div class="col-12 margin-top">
            <div class="row">
                <div class="col-lg-6 pt-5 pad-left pad-right pr-5 bk-grey pb-5">
                    <h4 class="materiale-h4">Events’ Set Up</h4>
                    <p>Aici intră proiectele pentru care chiar dacă ai avea un back-up plan, fragmentat sau nu, ar fi foarte dificil de pus în practică. Ăsta e motivul pentru care ai nevoie să lucrezi cu oameni în care ai încredere, foarte pricepuți în ceea ce fac, familiarizați cu logistica specifică tipului de proiect pe care îl ai de implementat. Dacă sunt și creativi, te pot ajuta să găsești soluții la care nu te-ai fi gândit, în acele momente în care ai mare nevoie de asta. Păstrează-i aproape. Noi așa facem cu ai noștri.</p>
                </div>

                <div class="col-lg-6 pt-5 pad-right pad-left pl-lg-5 position-relative">
                    <h4 class="materiale-h4 mt-5 mt-lg-0"><span class="materiale-h4-span">Creative</span> work and DTP</h4>
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-offset="250" class="creative-sign position-absolute">
                        <img src="{{ asset('img/yellow_circle.png') }}" srcset="{{ asset('img/yellow_circle.svg') }} 1x" class="img-fluid">
                    </div>
                    <p>Lucrăm foarte eficient cu simulările și cu fișierele de print primite de la client. Atunci când nu există, le dezvoltăm noi și ne asigurăm că implementarea viziunii tale pleacă de la o imagine corectă și completă sau că layout-ul pe care îl ai de printat iese exact în culorile din manualul de brand.</p>
                </div>
            </div>
        </div>

        <div class="col-12 pad-right margin-top margin-bottom">
            <div class="row">
                <div class="col-xl-9 offset-xl-3">
                    <h4 class="call-to-action text-center text-xl-left pl-xl-3 mb-0">This is where you call us!</h4>
                </div>
            </div>
        </div>

        @include("partials/_footer")

    </div>
</div>

@include("partials/_scripts")

<!-- ANIMATION SCRIPTS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>
