@extends('main')

@section('title', 'Info Page - Mucca - Playfully Committed')
    
@section('body_content')
<div class="page-wrapper container-fluid info-page">

    <div class="row position-relative">

        <div class="welcome-section col-12 d-flex flex-column pad-left pad-right pad-top pad-bottom">

            @include("partials/_home_nav")

        </div>

        <div class="col-xl-4 d-flex flex-column justify-content-between align-items-center align-items-xl-start mb-5 mb-xl-0 pad-left title-col">
            <h2 class="mt-0 mb-0" @if (App::isLocale('ro')) lang="ro" @endif>Info page</h2>
        </div>

        <div class="col-xl-8 d-flex flex-column justify-content-between info-col mt-5 mt-lg-0">
            <div class="row position-relative">
                <div class="col-md-6">
                    <h4 class="mb-4">{{__('Date identificare')}}</h4>
                    <p>
                        <strong>Mucca Production & Advertising SRL</strong>
                        <br>Sediu social: București, Al. Mirea Mioara Luiza nr. 1, bl. N22, sc. 2, etaj 1, apt. 21, sector 4, 041531
                        <br>Punct de lucru: Ilfov, Popești Leordeni, Șos. Olteniței nr. 209, 077160
                        <br>
                        <br>CUI: RO 31750754
                        <br>Reg. Com: J40/7147/2013
                        <br>IBAN: RO93 BACX 0000 0009 0345 8001
                        <br>Unicredit Bank S.A.
                    </p>
                </div>
                <div class="col-md-5 offset-md-1 bk-blue d-flex flex-column align-items-center justify-content-center scroll-col">
                    <p class="catalog-p text-center" @if (App::isLocale('ro')) lang="ro" @endif>Scroll to our<br> contact details</p>
                    <a href="#contact" class="btn btn-materiale">Go</a>
                </div>
            </div>
        </div>

        <div class="col-12 pad-left pad-right my-5">
            <h4 id="confidentialitate" class="green">{{__('Informare de confidențialitate')}}</h4>
            @if (App::isLocale('ro'))
                <p>Pentru Mucca, asigurarea confidentialitatii si securitatii datelor tale cu caracter personal este o obligatie, dar si o provocare pe care ne-o asumam cu draga inima. Dincolo de obligatia legala de a ne conforma prevederilor din Regulamentul UE 679/2016 (Regulamentul General privind Protectia Datelor – prescurtat RGPD), avem convingerea ca este extrem de important ca partenerii si clientii nostri sa stie ca, in orice moment, Mucca porneste de la premisa ca este absolut firesc sa asigure conditiile pentru confidentialitatea si securitatea datelor cu caracter personal. Prin aceasta informare, detaliem modul in care procesam datele tale personale, atunci cand: vizitezi mucca.ro, cand comunici sau comanzi de la noi.</p>
                <p><strong>Identitatea si datele de contact ale Operatorului.</strong></p>
                <p>MUCCA PRODUCTION & ADVERTISING SRL, operator de date cu caracter personal (denumit in continuare Operator), cu sediul in Bucuresti,  Al. Mirea Mioara Luiza, nr. 1, bl. N22, sc. 2, etaj 1, apt. 21, sector 4, inmatriculata in Registrul Comertului sub nr. J40 / 7147 / 2013, CIF: RO 31750754, cont nr. RO93 BACX 0000 0009 0345 8001, deschis la Unicredit Tiriac Bank – Sucursala N. Titulescu,  Bucuresti,  e-mail: hello@mucca.ro; telefon: 0758094410, prelucreaza legal si responsabil datele cu caracter personal colectate prin intermediul paginii de internet mucca.ro, prin respectarea RGPD si a prevederilor dreptului intern si prin implementarea si revizuirea periodica a masurilor organizatorice si tehnice de securitate.</p>
                <p><strong>Ce categorii de date personale prelucram?</strong></p>
                <p>De cele mai multe ori, datele cu caracter personal detaliate mai jos sunt prelucrate direct de la tine, atunci cand ne contactezi telefonic, cand plasezi o comanda sau cand ne transmiti e-mail. Prin intermediul mijloacelor oficiale de contact si al paginii mucca.ro, sunt prelucrate urmatoarele tipuri de date cu caracter personal:</p>
                <ul>
                    <li>• nume si prenume;</li>
                    <li>• adresa de e-mail;</li>
                    <li>• numar de telefon;</li>
                    <li>• adresa domiciliu/corespondenta;</li>
                    <li>• informatii bancare;</li>
                    <li>• industria (domeniul de activitate);</li>
                    <li>• CNP (in cazul facturarii catre persoane fizice);</li>
                    <li>• IP, browser utilizat si date privind comportamentul de vizitator al paginii mucca.ro.</li>
                </ul>
                <p>Nu prelucram date speciale cu caracter personal, asa cum sunt ele definite de RGPD. De asemenea, nu dorim sa colectam sau sa prelucram date ale minorilor care nu au implinit varsta de 16 ani.</p>
                <p><strong>Care sunt scopurile prelucrarii datelor? In ce temeiuri se realizeaza aceasta?</strong></p>
                <p>Datele cu caracter personal mentionate mai sus sunt prelucrate in urmatoarele scopuri:</p>
                <ul>
                    <li>1.  facturarea produselor achizitionate de tine;</li>
                    <li>2.  comunicarea de informatii intre parti referitoare la produsele achizitionate;</li>
                    <li>3.  solutionarea problemelor legate de produsele comandate si expediate catre tine (returnare, rambursarea sumelor platite pentru articolele returnate);</li>
                    <li>4.  livrarea, prin servicii de curierat rapid, a produselor comandate de tine.
                        <br><span>Prelucrarea datelor personale pentru aceste scopuri (1 - 4) are loc in temeiul art. 6, alin. 1, lit. a, b, c din RGPD si este in cele mai multe cazuri necesara pentru incheierea si executarea unui contract (contractul  la distanta) intre parti. De asemenea, unele prelucrari determinate de aceste scopuri sunt impuse de legislatia aplicabila in materie fiscala si contabila.</span>
                    </li>
                    <li>5.  imbunatatirea serviciilor pe care le prestam pentru tine.
                        <br><span>Pentru acest scop, putem prelucra unele informatii in legatura cu comportamentul tau de cumpararor/vizitator al site-ului mucca.ro. Ne intemeiem acest tip de prelucrare, care are loc in temeiul art. 6, alin. 1, lit. f din RGPD, pe interesul nostru legitim de a desfasura activitati comerciale, avand intotdeauna grija ca drepturile si libertatile tale fundamentale sa nu fie afectate.</span>
                    </li>
                    <li>6.  protectie si securitate;</li>
                </ul>
                <p>Mucca poate amplasa camere de luat vederi in sediul societatii si in celelalte spatii detinute, pentru a-și proteja interesele legitime. Spatiile unde sunt amplasate camere de luat vederi sunt intotdeauna marcate cu o avertizare. Putem prelucra datele obtinute prin acest tip de procesare in baza unui interes legitim, care consta in asigurarea protectiei si securitatii sistemelor si clientilor nostri.</p>
                <p>Prelucrarea datelor cu caracter personal se face prin mijloace automatizate si manuale.</p>
                <p><strong>Perioada de stocare a datelor prelucrate</strong></p>
                <p>Vom prelucra datele personale pe durata necesara executarii obligatiilor contractuale de catre oricare dintre parti. Datele personale vor fi stocate atat timp cat este necesar pentru scopurile mentionate mai sus sau pe o perioada de timp prevazuta de dispozitiile legale. In anumite cazuri, conform cerintelor legale, este posibil sa pastram anumite date personale despre tine, daca exista un sold negativ sau un litigiu nerezolvat. Nu toate datele tale cu caracter personal au aceeasi perioada de pastrare. Documentele contabile, de exemplu facturile emise de Operator, sunt arhivate conform legii, pe o perioadă de 10 ani de la emiterea acestora.</p>
                <p><strong>Cu ce categorii de destinatari partajam datele tale?</strong></p>
                <p>Datele personale procesate de Operator sunt/pot fi partajate cu urmatoarele categorii de destinatari:</p>
                <ul>
                    <li>a) furnizorilor de servicii de curierat;</li>
                    <li>b) furnizorilor de servicii bancare si nebancare;</li>
                    <li>c) societati care presteaza servicii referitoare la functionarea sistemelor informatice;</li>
                    <li>d) societati care presteaza servicii de hosting;</li>
                    <li>e) autoritati publice, in cazul in care avem o obligatie legala sau daca trebuie sa ne protejam un interes legitim.</li>
                </ul>
                <p>Atunci cand folosim o persoana fizica sau juridica ca persoana imputernicita pentru prelucrarea unei parti a datelor tale personale, ne vom asigura ca isi asuma obligatiile de a prelucra datele potrivit instructiunilor noastre si de a implementa masuri pentru protejarea confidentialitatii. Nu transferam si nu intentionam sa transferam datele tale personale catre alte companii, organizatii sau persoane din state terte.</p>
                <p><strong>Securitatea datelor cu caracter personal</strong></p>
                <p>Pentru prelucrarea datelor tale personale, Operatorul aplica masurile tehnice si organizatorice necesare in vederea asigurarii securitatii acestora, protejarii impotriva distrugerii accidentale sau ilegale, modificarii, dezvaluirii sau accesului neautorizat, conform standardelor industriei. Imbunatatirea permanenta a masurilor de securitate informatica este una dintre prioritatile noastre.</p>
                <p><strong>Ce drepturi ai? Cum le poti folosi?</strong></p>
                <p>Conform RGPD, beneficiezi de urmatoarele drepturi (ele sunt prezentate pe larg in articolele 12 – 23 ale RGPD):</p>
                <ul>
                    <li>- informare si acces (poti obtine informatii referitoare la prelucrarea datelor tale personale, in baza unei cereri, la care vom raspunde in maximum 30 de zile);</li>
                    <li>- rectificare (dreptul de a obtine rectificarea datelor incorecte sau completarea datelor incomplete);</li>
                    <li>- stergerea datelor (“dreptul de a fi uitat”);</li>
                    <li>- restrictionarea prelucrării (poti solicita motivat restrictionarea procesarii datelor tale);</li>
                    <li>- portabilitatea datelor (poti solicita primirea datelor personale, la cerere, intr-un format structurat, utilizat in mod curent si care poate fi citit automat);</li>
                    <li>- opozitia fata de prelucrarea datelor (de exemplu, ai dreptul sa te opui oricand fata de prelucrarea de catre noi a datelor personale in scop de marketing direct);</li>
                    <li>- dreptul de a nu fi supus unei proces individual automatizat.</li>
                </ul>
                <p>Beneficiezi de dreptul de a te adresa instantelor de judecata sau Autoritatii Nationale de Supraveghere a Prelucrarii Datelor cu Caracter Personal. Iti poti exercita oricand aceste drepturi, prin email la adresa hello@mucca.ro sau ne poti transmite o scrisoare la adresa  Al. Mirea Mioara Luza, nr. 1, sector 4, Bucuresti.</p>
                <p>Acest document, prezentat in prima editie, este aplicabil din 25.05.2018. Ne rezervam dreptul de a-i aduce orice completari sau modificari necesare.</p>
                <h4 id="cookies" class="green">Politica privind modulele cookie.</h4>
                <p>Da, ai dreptate. “Politica privind modulele cookie” suna cam pompos pentru modul nostru de a fi si de a lucra cu clientii. Mucca te-a obisnuit pana acum cu o abordare noua, creativa, dezinhibata. Totusi, iti adresam aceasta comunicare pentru ca, de la 25 mai 2018, a inceput sa produca efecte o colectie speciala de reglementari europene, cunoscute ca Regulamentul (UE) 2016/679 privind protectia persoanelor fizice (Regulamentul general privind protectia datelor). O sa-i spunem de aici inainte RGPD, este mai usor asa.</p>
                <p>Trecem la subiect. Unul dintre efectele RGPD este ca fiecare operator de date cu caracter personal care utilizeaza website-uri trebuie sa-i informeze pe vizitatori in legatura cu specificatiile site-ului respectiv si, mai ales, cu cookie-urile folosite, ghidandu-i cu privire la gestionarea acestora. Mucca.ro  utilizeaza module cookie pentru a ne asigura ca site-ul functioneaza eficient si ca tu vei avea o experienta de navigare OK. Te rugam sa citesti atent prezenta politica. Daca nu esti de acord cu informatiile continute, ai oricand posibilitatea  de a nu utiliza acest website, desi ne-ar  parea tare rau sa iti pierdem atentia si prietenia.</p>
                <p>Dar ce sunt cookies? Incepem prin a-ti spune ce nu sunt. Cookie-urile nu sunt virusi. Cookie-urile noastre nu retin date cum ar fi numele/prenumele sau detalii bancare. Cookie-urile sunt inofensive, nu contin programe software sau spyware si nu pot accesa informatiile de pe hard drive-ul utilizatorului. Cookies sunt fisiere text de mici dimensiuni, care contin cantitati restranse de informatii si sunt descarcate pe dispozitivul pe care il folosesti de catre un server special pentru mucca.ro. Browser-ul trimite apoi aceste cookie-uri la mucca.ro la fiecare vizita ulterioara, astfel incat sa te poata recunoaste si sa-si aminteasca lucruri precum preferintele de utilizator (exemple: vizite sau clickuri). O lista a cookie-urilor folosite de site-ul nostru poate fi obtinuta prin folosirea instrumentului disponibil pe site-ul  <a href="https://cookies.bit-sentinel.com/" target="_blank" class="green"><strong>https://cookies.bit-sentinel.com/</strong></a>. Informatii detaliate despre modul in care functioneaza modulele cookie pot fi consultate la adresa <a href="http://www.aboutcookies.org/" target="_blank" class="green"><strong>http://www.aboutcookies.org/.</strong></a></p>
                <p>Folosim urmatoarele categorii de cookies: necesare, statistice si de marketing. Sa le luam pe rand.</p>
                <ul>
                    <li>• cookies necesare (acestea fac site-ul functional si iti permit, printre altele, sa navighezi pe paginile mucca.ro. Fara acest tip de cookies, website-ul nostru are slabe sanse sa functioneze)</li>
                    <li>• cookies statistice, analitice sau de performanta (sunt cookie-uri folosite pentru a ne ajuta sa intelegem daca informatiile pe care ti le  oferim sunt eficiente, daca modul de comunicare privitor la serviciile noastre este cel mai bun. De asemenea, cookie-urile analitice ne dau posibilitatea sa imbunatatim modul de functionare a site-ului. Putem urmari, de exemplu, cati utilizatori individuali acceseaza acest site web si cat de des. Aceste informatii sunt utilizate numai in scopuri statistice si nu pentru a identifica personal vreun utilizator. Unele dintre aceste cookies sunt gestionate pentru noi de alte companii, acestea nu au insa dreptul sa le foloseasca in alte scopuri decat cele amintite. Exemplu de First Party Cookies: Google Analytics. Aceste cookies sunt folosite de catre Google pentru a realiza rapoarte si pentru a ne ajuta sa imbunatatim website-ul. Poti afla mai multe despre cookies utilizate de Google Analytics aici.</li>
                    <li>• cookies de marketing (unele dintre cookies sunt gestionate pentru noi de alte companii, dar acestea nu au dreptul sa foloseasca datele in alte scopuri decat cele amintite. Exemple de Third Party Cookies: Facebook. Puteti afla mai multe despre cookies utilizate de Facebook aici). Modalitati de control privind modulele cookie exista si ele iti dau posibilitatea sa iti costumizezi experienta de navigare. Retine insa faptul ca eliminarea sau blocarea cookie-urilor poate avea un impact asupra experientei tale de utilizator. De exemplu, daca alegi sa dezactivezi cookie-urile necesare, anumite parti ale acestui site nu mai pot fi pe deplin accesibile. Setarea utilizarii cookie-urilor este inclusa in browserul de Internet. Cele mai multe Internet Browser sunt setate initial sa accepte automat cookies. Cu ajutorul browser-ului insa, poti refuza aceste cookies sau le poti reduce la anumite tipuri, pe care le selectezi special. Informatii despre browsere si setarea preferintelor privind cookie-urile pot fi gasite pe urmatoarele pagini Web: Chrome, Firefox, Internet Explorer, Safari. Pentru mai multe informatii despre modificarea setarilor browser-ului pentru blocarea sau filtrarea modulelor cookie, consulta <a href="http://www.aboutcookies.org/" target="_blank" class="green"><strong>http://www.aboutcookies.org/.</strong></a>
                </ul>
                <p>Utilizam “butoane sociale” (Facebook, Instagram, LinkedIn, Google+) pentru a permite utilizatorilor nostri sa partajeze sau sa marcheze pagini web. Acestea sunt butoane pentru site-urile social media ale tertilor, iar aceste site-uri pot inregistra informatii despre activitatile voastre pe Internet, inclusiv pe acest site web. Consulta termenii de utilizare si politicile de confidentialitate ale acestor site-uri pentru a intelege exact modul in care acestea utilizeaza datele tale si pentru a afla cum sa stergi sau sa renunti la aceste cookies.</p>
                <p>Site-ul nostru contine link-uri catre alte pagini web, de regula ale clientilor nostri. Aceste site-uri pot fi detinute si operate de alte companii si organizatii, care pot avea alte politici de securitate si de protectie a datelor personale. Mucca nu adminte vreo responsabilitate cu privire la informatiile, materialele, produsele sau serviciile incluse sau accesibile prin intermediul acestor website-uri.</p>
                <p><strong>Actualizarile Politicii</strong></p>
                <p>Acesata politica este in prima editie si are aplicabilitate din data de 25 mai 2018. Ne rezervam dreptul de a face orice completari sau modificari in aceasta Politica privind modulele cookie. Te rugam sa vizitezi aceasta pagina periodic, pentru a te informa asupra modificarilor ce pot aparea.</p>
                <p id="contact"><strong>Contact</strong></p>
                <p>Daca ai nelamuriri sau doresti sa ne adresezi solicitari cu privire la aspectele descrise aici, poti sa ne scrii la adresa de e-mail <a href="mailto:hello@mucca.ro"><strong>hello@mucca.ro</strong></a> sau ne poti transmite o scrisoare la adresa <strong>Ilfov, Popesti Leordeni, Sos. Oltenitei nr. 209.</strong></p>
            @else
                <p>For Mucca, ensuring the confidentiality and security of your personal data is an obligation, but also a challenge that we take on with all our hearts. Beyond the legal obligation to comply with the provisions of the EU Regulation 679/2016 (General Data Protection Regulation - abbreviated GDPR), we believe that it is extremely important for our partners and customers to know that, at any time, Mucca conducts its business based on the premises that it is absolutely natural to ensure the conditions for the confidentiality and security of personal data. Through this notice, we would detail the way we process your personal data, when: you visit mucca.ro, when you communicate or order from us.</p>
                <p><strong>Controller&#39;s identity and contact data</strong></p>
                <p>MUCCA PRODUCTION &amp; ADVERTISING SRL, personal data controller (hereinafter referred to as the Controller), headquartered in Bucharest, 1 Mirea Mioara Luiza Alley, bl. N22, entrance 2, 1st floor, apt. 21, District 4, registered with the Trade Register under the no. J40 / 7147 / 2013, having the Tax Registration Number (CIF): RO 31750754, and bank account no. RO93 BACX 0000 0009 0345 8001, opened with Unicredit Tiriac Bank –N. Titulescu Branch, Bucharest, email: hello@mucca.ro; telephone: 0758094410, processes legally and responsibly the personal data collected through mucca.ro website, by complying with GDPR and the provisions of domestic law and by implementing and periodically reviewing the organizational and technical security measures.</p>
                <p><strong>What categories of personal data do we process?</strong></p>
                <p>Most of the time, the personal data detailed below are processed directly from you, when you contact us by phone, when you place an order or when you send us an email. When using the official means of contact and the mucca.ro webpage, the following types of personal data are processed:</p>
                <ul>
                    <li>• last name and first name;;</li>
                    <li>• email address;</li>
                    <li>• telephone number;</li>
                    <li>• home/correspondence address;</li>
                    <li>• bank information;</li>
                    <li>• industry (field of activity);</li>
                    <li>• CNP (Personal Identification Number) (for invoices issued to natural persons);</li>
                    <li>• IP, used browser and data regarding the mucca.ro webpage visitor behaviour.</li>
                </ul>
                <p>We do not process special personal data, as defined by GDPR. We also do not want to collect or to process data from minors under the age of 16.</p>
                <p><strong>What are the purposes of data processing? On what grounds is this achieved?</strong></p>
                <p>The abovementioned personal data are processed for the following purposes:</p>
                <ul>
                    <li>1.  invoicing of the products you purchased;</li>
                    <li>2.  communication of information between the parties in respect of the purchased products;</li>
                    <li>3.  solving the issue connected to the products ordered and shipped to you (return, reimbursement of
                        the amounts paid for returned items);</li>
                    <li>4.  delivery, by means of express courier services, of the products you ordered.
                        <br><span>The processing of personal data for such purposes (1 - 4) shall be carried out pursuant to Art. 6, para. 1, letters a, b, c of GDPR and, in most of the cases, is needed to enter into and execute an agreement (distance contract) between the parties. Also, some processing determined by these purposes are required under the applicable laws in the field of tax and accounting.</span>
                    </li>
                    <li>5.  improving the services we provide to you.
                        <br><span>For this purpose, we can process some information connected to your behaviour as purchaser/visitor of mucca.ro website. We base this type of processing, which is being carried out under Art. 6, para. 1, letter f of GDPR, on our legitimate interest to carry out commercial activities, always taking care that your fundamental rights and freedoms are not violated.</span>
                    </li>
                    <li>6.  protection and security;</li>
                </ul>
                <p>Mucca may place security cameras at the company&#39;s headquarters and at the other premises held, in order to protects its legitimate interests. The areas where security cameras are places shall always be marked by a warning. We may process the data obtained through this type of processing based on a legitimate interest, which consists in ensuring the protection and security of our systems and clients.</p>
                <p>The processing of personal data shall be carried out by automated and manual means.</p>
                <p><strong>Processed data storage period</strong></p>
                <p>We will process the personal data throughout the time necessary to perform the contractual obligations by any of the parties. The personal data will be stored as long as necessary for the purposes stated above or for a period of time set forth by the legal provisions. In certain cases, as per the legal requirements, we may keep some of your personal data, should there be a negative balance or an unsettled dispute. Not all your personal data are subject to the same storage period. The accounting documents, for example, the invoices issued by the Controller, shall be archived according to the law, for a period of 10 years as of the issuance thereof.</p>
                <p><strong>What categories of recipients do we share your data with?</strong></p>
                <p>The personal data processed by the Controller are/can be shared with the following categories of recipients:</p>
                <ul>
                    <li>a) courier services providers;</li>
                    <li>b) providers of banking and non-banking services;</li>
                    <li>c) companies that provide services related to the operation of information systems;</li>
                    <li>d) companies providing hosting services;</li>
                    <li>e) public authorities, when we have a legal obligation or if we have to protect a legitimate interest.</li>
                </ul>
                <p>When we use a natural person or a legal entity as entity empowered to process some parts of your personal data, we will make sure that they undertake the obligations to process the data as per our instructions and to implement measures to protect privacy. We do not transfer nor do we intent to transfer your personal data to other companies, organizations or individuals in third countries.</p>
                <p><strong>Security of personal data</strong></p>
                <p>Having in view the processing of your personal data, the Controller shall apply the technical and organizational measures needed in order to ensure the security thereof, the protection against accidental or illegal destruction, amendment, disclosure or unauthorised access, as per industry standards. Continuous improvement of computer security measures is one of our priorities.</p>
                <p><strong>What rights do you have? How can you use them?</strong></p>
                <p>According to GDPR, you have the following rights (they are disclosed in detail in Articles 12 – 23 of GDPR):</p>
                <ul>
                    <li>- iinformation and access (you can obtain information on the processing of your personal data, based on a request to which we will respond within maximum 30 days);</li>
                    <li>- correction (the right to obtain the correction of incorrect data or the supplementation of incomplete data);</li>
                    <li>- deletion of data (“the right to be forgotten”);</li>
                    <li>- processing restriction (you can reasonably request the restriction of your data processing);</li>
                    <li>- data portability (you can request the receipt of personal data, upon request, in a structured format, currently used and which can be read automatically);</li>
                    <li>- objection to data processing (for example, you have the right to object at any time to our processing of your personal data for direct marketing);</li>
                    <li>- the right not to be subject to an automated individual process.</li>
                </ul>
                <p>You have the right to address the courts of law or the National Supervisory Authority for Personal Data Processing. You can exercise these rights at any time, via email, at the following address: hello@mucca.ro, or you can send us a letter at 1 Mirea Mioara Luza Alley, District 4, Bucharest.</p>
                <p>This document, disclosed as a first issue, shall be applicable as of 25.05.2018. We reserve the right to make any necessary additions or amendments.</p>
                <h4 id="cookies" class="green">Cookie Modules Policy</h4>
                <p>Yes, you are right. The &quot;cookie modules policy&quot; sounds a bit pompous for the way we are and work with our customers. So far, Mucca has accustomed you with a new, creative, uninhibited approach. However, we send you this notice because, as of May 25, 2018, a special collection of European regulations, known as Regulation (EU) 2016/679 on the protection of natural persons (General Data Protection Regulation) has become effective. We&#39;ll call it GDPR from now on, it&#39;s easier that way.</p>
                <p>Let&#39;s cut to the chase. One of GDPR effects is that every personal data controller who uses websites should inform its visitors in respect of the specifications of that website and, in particular, the cookies used, guiding them thorough the management thereof. Mucca.ro uses cookie modules to make sure that our website works efficiently and that you will have an OK browsing experience. Please read this policy carefully. If you do not agree with the information included, you have the possibility, at any time, not to use this website, although we would be very sorry to lose your attention and friendship.</p>
                <p>But what are cookies? We shall begin by telling you what they are not. Cookies are not viruses. Our cookies
                    do not retain data, such as your name/first name or bank details. Cookies are harmless, they do not contain
                    software or spyware and cannot access the information on user&#39;s hard drive. Cookies are small text files,
                    that contain limited amount of information and are downloaded to the device you use by a special server for
                    mucca.ro. The browser then sends these cookies to mucca.ro during each subsequent visit, so that it can
                    recognise you and remember things such as user preferences (e.g.: visits or clicks). A list of the cookies
                    used by our website can be obtained by using the tool available on the website <a href="https://cookies.bit-sentinel.com/" target="_blank" class="green"><strong>https://cookies.bit-sentinel.com/</strong></a>. The detailed information on how cookie modules work can be found at <a href="http://www.aboutcookies.org/" target="_blank" class="green"><strong>http://www.aboutcookies.org/.</strong></a></p>
                <p>We use the following categories of cookies: necessary, statistic and marketing. Let&#39;s take them one at a time.</p>
                <ul>
                    <li>• necessary cookies (they make the site functional and allow you, among other things, to browse the mucca.ro pages. Without this type of cookie, our website has little chance of working)</li>
                    <li>• statistical, analytical or performance cookies (these are cookies used to help us understand whether the information we offer you are efficient, whether our communication method regarding our services is the best. The analytical cookies also give us the possibility to improve the website operation. For example, we can track how many individual users access this website and how often. This information is used only for statistical purposes and not to personally identify any user. Some of these cookies are managed for us by other companies, however, they are not entitled to use them for purposes other than those set forth above. For example, First Party Cookies: Google Analytics. These cookies are used by Google to compile reports and to help us improve our website. You can find out more about the cookies used by Google Analytics <a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage?hl=ro"><strong>here</strong>.</a></li>
                    <li>• marketing cookies (some of the cookies are managed for us by other companies, but these are not entitled to use the data for purposes other than those mentioned. For example, Third Party Cookies: Facebook. You can find out more about the cookies used by Facebook <a href="https://www.facebook.com/policies/cookies/" target="_blank" class="green"><strong>here</strong></a>).
                </ul>
                <p>The methods to control the cookie modules exist and they give you the possibility to customize your browsing experience. However, please remember that eliminating or blocking cookies may have an impact on your user experience. For example, if you choose to disable the necessary cookies, certain parts of this website can no longer be fully accessible. The setting for using cookies is included in the Internet browser. Most Internet Browsers are initially set to automatically accept cookies. However, with the help of your browser you can refuse these cookies or you can reduce them to certain types, which you select in particular. Information about browsers and setting cookies preferences can be found on the following web pages: <a href="https://support.google.com/accounts/answer/61416?hl=ro&amp;co=GENIE.Platform%3DDesktop&amp;oco=1" target="_blank" class="green"><strong>Chrome</strong></a>, <a href="https://support.mozilla.org/ro/kb/activarea-si-dezactivarea-cookie-urilor" target="_blank" class="green"><strong>Firefox</strong></a>, <a href="https://support.microsoft.com/ro-ro/topic/%C8%99tergerea-%C8%99i-gestionarea-modulelor-cookie-168dab11-0753-043d-7c16-ede5947fc64d" target="_blank" class="green"><strong>Internet Explorer</strong></a>, <a href="https://support.google.com/accounts/answer/61416?hl=ro&amp;co=GENIE.Platform%3DAndroid&amp;oco=1" target="_blank" class="green"><strong>Android</strong></a>. For more information about changing browser settings to block or filter the cookie modules, please see <a href="http://www.aboutcookies.org/" target="_blank" class="green"><strong>http://www.aboutcookies.org/</strong></a>.</p>
                <p>We use &quot;social buttons&quot; (Facebook, Instagram, LinkedIn, Google+) to allow our users to share or bookmark web pages. These are buttons for third party social media sites and these sites can record information about your activities on the Internet, including on this website. Please see the terms of use and the privacy policies of these sites to understand exactly how they use your data and to find out how you can delete or discard these cookies.</p>
                <p>Our site contains links to other web pages, usually, those of our clients These sites may be owned and operated by other companies and organizations, which may have other security and personal data protection policies. Mucca does not accept any responsibility in respect of the information, materials, products or services included or accessible through these websites.</p>
                <p><strong>Policy Updates</strong></p>
                <p>This policy is in its first edition and is applicable from. We reserve the right to make any additions or amendments to this Cookie Modules Policy. Please visit this page periodically to find out about any changes that may occur.</p>
                <p id="contact"><strong>Contact</strong></p>
                <p>If you have any questions or want to send us requests regarding the aspects described here, you can write to us at the email address <a href="mailto:hello@mucca.ro"><strong>hello@mucca.ro</strong></a> or you can send us a letter at <strong>Ilfov, Popesti Leordeni, Sos. Oltenitei nr. 209.</strong></p>
            @endif

        </div>

        <div class="col-12 d-flex flex-column justify-content-center align-items-center mb-5">
            <a href="#" class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{asset('img/up_arrow.png')}}" srcset="{{asset('img/up_arrow.svg')}} 1x" class="img-fluid mb-3" alt="icon-arrow">
                <span class="back-arrow-text d-block text-center"><strong>{{__('Înapoi sus')}}</strong></span>
            </a>
        </div>

        @include("partials/_footer")

    </div>

</div>
@endsection
