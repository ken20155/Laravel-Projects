


<ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-annoucement-tab" data-bs-toggle="pill" data-bs-target="#pills-annoucement" type="button" role="tab" aria-controls="pills-annoucement" aria-selected="true">Annoucement</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-aboutus-tab" data-bs-toggle="pill" data-bs-target="#pills-aboutus" type="button" role="tab" aria-controls="pills-aboutus" aria-selected="false">About Us</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-services-tab" data-bs-toggle="pill" data-bs-target="#pills-services" type="button" role="tab" aria-controls="pills-services" aria-selected="false">Services</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-programpartners-tab" data-bs-toggle="pill" data-bs-target="#pills-programpartners" type="button" role="tab" aria-controls="pills-programpartners" aria-selected="false">Program&nbsp;Partners</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-faq-tab" data-bs-toggle="pill" data-bs-target="#pills-faq" type="button" role="tab" aria-controls="pills-faq" aria-selected="false">FAQs</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact&nbsp;Us</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-annoucement" role="tabpanel" aria-labelledby="pills-annoucement-tab">

    <h1 class="text-center">ANNOUNCEMENT</h1>
    <div class="row">
        <div class="col-6">
          <label for="">Month</label>
          <select name="event_category" id="month" class="form-select form-select-sm" required>
            <option value="" selected>-Select-</option>
            <?php 
            $months = [
                '01'  => "January",
                '02'  => "February",
                '03'  => "March",
                '04'  => "April",
                '05'  => "May",
                '06'  => "June",
                '07'  => "July",
                '08'  => "August",
                '09'  => "September",
                '10' => "October",
                '11' => "November",
                '12' => "December"
            ];
    
            // Loop through the array and display each month with its key
            foreach ($months as $key => $month) {
                echo '<option value="'.$key.'">'.$month.'</option>';
            }
            ?>
        </select>
        </div>
        <div class="col-6">
          <label for="">Year</label>
          <input type="number" id="year" class="form-control form-control-sm" value = "2024" required>
        </div>
    </div>
    
    <div id="getAnnoucement">
    
    </div>


   

  </div>
  <div class="tab-pane fade" id="pills-aboutus" role="tabpanel" aria-labelledby="pills-aboutus-tab">
    <h1 class="text-center">ABOUT NEGOSYO CENTER</h1>
    <div class="content-body" style="font-size:20px">
        The Negosyo Center Program is responsible for promoting ease of doing business and facilitating access to services for Micro, Small, and Medium Enterprises (MSMEs). Republic Act No. 10644 otherwise known as the “Go Negosyo Act,” seeks to strengthen MSMEs to create more job opportunities in the country.
        <br>
        <br>
        The Program started in 2014, with 5 Centers established in the islands of Luzon, Visayas, and Mindanao. Since then, more Centers have been set up nationwide bringing ease of doing business closer to MSMEs in all regions. Negosyo Centers help stimulate entrepreneurship development as MSMEs contribute substantially in driving the Philippine economy.
        <br>
        <br>
        Negosyo Centers are found in strategic areas convenient for the existing and would-be entrepreneurs, such as DTI offices, Local Government Units (LGU), academe, Non-Government Organizations (NGOs), and malls.
    </div>
    <video poster="<?= env('APP_URL') ?>public\main\image\nc-about.png" controls="controls" width="100%" height="447">
      <source src="<?= env('APP_URL') ?>public\main\image\AboutUs.mp4" type="video/mp4">
    </video>
  </div>
  <div class="tab-pane fade" id="pills-services" role="tabpanel" aria-labelledby="pills-services-tab">
      <h1 class="text-center">SERVICES</h1>
      <p class="text-center"><img src="<?= env('APP_URL') ?>public\main\image\09112020_ADV_NC-768x661.jpg" alt="" sizes="" srcset=""></p>
      <video poster="<?= env('APP_URL') ?>public\main\image\nc-services.png" controls="controls" width="100%" height="447">
        <source src="<?= env('APP_URL') ?>public\main\image\Services.mp4" type="video/mp4">
      </video>
  </div>
  <div class="tab-pane fade" id="pills-programpartners" role="tabpanel" aria-labelledby="pills-programpartners-tab">
    <h1 class="text-center">Program Partners</h1>
    <p class="text-center"><img src="<?= env('APP_URL') ?>public\main\image\program_partners.png" alt="" sizes="" srcset=""></p>
  </div>
  <div class="tab-pane fade" id="pills-faq" role="tabpanel" aria-labelledby="pills-faq-tab">

    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            NEGOSYO CENTER
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">

            <h5>How can a Negosyo Center help me in my business?</h5>

            Negosyo Centers are established to provide or facilitate access to various business development services for MSMEs.
            <br>
            Negosyo Center is a pivotal first step in doing business. Whether you are starting or would want to improve your business or enterprise, there are Business Counsellors available in the Negosyo Centers to assist you. Negosyo Centers conduct and link Micro, Small, and Medium Enterprises (MSMEs) to seminars, trainings, and programs related to setting-up a business, marketing, financial literacy and more. Furthermore, MSMEs may avail advisory services tailored according to their business needs and assistance in the processing and documentation of necessary paper requirements among others.
            
            <br>
            <h5 class="mt-3">Who can avail of these services?</h5>
            <br>
            MSMEs as defined in Section 3 of RA No. 9501 may avail of the services of the Negosyo Center. In particular, “any business activity or enterprise engaged in industry, agribusiness and/or services, whether single proprietorship, cooperative, partnership or corporation whose total assets, inclusive of those arising from loans but exclusive of the land on which the particular business entity’s office, plant and equipment are situated, must have value falling under the following categories:
            <br>
            <span style="margin-left:30px">Micro : not more than P 3,000,000.00</span>
            <br>
            <span style="margin-left:30px">Small : P 3,000,001 – P 15,000,000</span>
            <br>
            <span style="margin-left:30px">Medium : P 15,000,001 – P 100,000,000</span>
            <br>
            <h5 class="mt-3">Where to find the nearest Negosyo Center?</h5>
            <br>
            Visit www.dti.gov.ph/negosyo/negosyo-center/directory/  to look for the Negosyo Center in your area. Just type in your region, province, and municipality to locate the center near you. The contact details of the Business Counsellors are also accessible.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
           STARTING A BUSINESS 
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <h5 class="mt-3">Starting A Small Enterprise: Process Flow</h5>

            Look Within: Do you have what it takes?
            
            <h1>↓</h1>
            
            Look Outside: What are the helping/hindering factors?
            
            <h1>↓</h1>
            
            Determine your product/service line and type of business
            
            <h1>↓</h1>
            
            Write your business plan (1) Marketing Aspects (2) Technical (Production) Aspects (3) Organizational Aspects (4) Financial Aspects
            
            <h1>↓</h1>
            
            Raise Capital
            
            <h1>↓</h1>
            
            Seek other sources of assistance if necessary
            
            <h1>↓</h1>
            
            Choose your business location
            
            <h1>↓</h1>
            
            Register your business
            
            <h1>↓</h1>
            
            Hire/train personnel
            
            
            <h5 class="mt-3">Determining Product Line and Business Type</h5>

            Some of the factors you can look into to choose the type of business or product line you’d want to venture include the specific fields you are interested in, suitableness to your skills, hobbies or work experience.
            <br>
            Below are the broad types of product and service lines:
            <br>
            1. Product industries<br>
             <span style="margin-left:30px">You may choose to manufacture your own product, either for the mass market or for specialized or individual demands. Canned goods, wooden or plastic toys, and ready-to-wear garments are examples of goods produced for the mass market, while precision instruments for industrial use, and made-to-order furniture are examples of specialized products.</span>
             <br>
            2. Service industries<br>
             <span style="margin-left:30px">You may choose to provide services. Service enterprises include repair and maintenance shops, printing and machine shops, and food retailing and catering establishments. Beauty parlors, dress and tailoring shops, recreation centers (bowling alleys, billiard halls, badminton courts) and entertainment businesses (theatres, videoke parlors, bars and pub houses) are also considered service businesses. The sunrise information technology (IT) industry is largely service. Think call centers, internet cafes, computer hardware and software shops, and business solutions programming companies.</span>
             <br>
            3. Process industries<br>
             <span style="margin-left:30px">You may decide to perform only one or two operations in the total manufacturing process. If so, you are not, strictly speaking, a “manufacturer” but rather a “process” enterprise. The activities you perform can be initial operations on raw materials (milling, corrugating, sawing or cutting), final operations (finishing, assembly, packing or binding), or skilled or precision operations (embroidery, testing, woodcarving).</span>
             <br>
            4. Subcontracting industries<br>
             <span style="margin-left:30px">If you choose to be a subcontractor, you will undertake subcontracting work for other enterprises, usually bigger ones. Big companies sometimes subcontract the manufacture of components, supplies or other specialized operations to smaller shops because the quantity required is not cost effective for their high-capacity operations. Many big companies also find subcontracting a cheaper and faster way to manufacture products. On the other hand, you, as subcontractor, are assured of a market for your products. You can probably avail of technical and financial assistance from your principal (the big firm), too. There is, however, a drawback to subcontracting: you may tend to rely on only one or two partner firms to stay in business.</span>

          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
           PROCESSING OF DOCUMENTS
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">

                <div class="su-spoiler-content su-u-clearfix su-u-trim"><p><strong>Business Name Registration</strong></p><ul><li>Go to the Negosyo Center in the city/municipality/province in which the business is located with the accomplished unified application form for business name registration.</li><li>Submit the documents to the Receptionist/Information Officer for business name.</li><li>Processing of DTI Business Name Registration*<ol><li>The receptionist/information officer will turn over the documents to the Business Name Registration Section of the DTI Office for appropriate same-day processing and will request the client to refer to said section and wait for further instructions. *For Negosyo Centers equipped with Philippine Business Registry (PBR) kiosk, the receptionist/information officer will refer the application to an in-house Business Counsellor who shall provide the assistance to register through the PBR System.</li></ol></li><li>The information officer releases the approved registration/permit/license to the client’s representative.</li></ul><p><strong>CDA:</strong></p><p>For the registration of cooperatives and other related concerns, please refer to the Cooperative Development Authority. You may visit their website at <a href="http://cda.gov.ph" target="_blank" class="outbound-link">http://cda.gov.ph</a></p><p><strong>SEC:</strong></p><p>For the registration of partnerships and corporations, please refer to the Securities and Exchange Commission. You may visit their website at <a href="http://www.sec.gov.ph" target="_blank" class="outbound-link">http://www.sec.gov.ph</a> or <a href="https://www.sec.gov.ph/online-services/sec-company-registration-system/" target="_blank" class="outbound-link">https://www.sec.gov.ph/online-services/sec-company-registration-system/</a>&nbsp;for the online company registration system.</p><p><strong>BIR Registration</strong></p><p>The assessment and collection of all national internal revenue taxes, fees and&nbsp;charges are the Bureau of Internal Revenue’s (BIR) overall responsibility. For taxation purposes, every business enterprise should be registered with the&nbsp;BIR.&nbsp;The&nbsp;Bureau&nbsp;also enforces all&nbsp;forfeitures, penalties and fines regarding&nbsp;its authority. The Bureau&nbsp;will&nbsp;furnish your business with its own tax identification number (TIN) and the authority to print receipt, invoices, and others.</p><p>For registration,&nbsp;tax queries and concerns,&nbsp;please refer&nbsp;to the Bureau of Internal Revenue through <u><a href="mailto:contact_us@cctr.bir.gov.ph" target="_blank" class="outbound-link">contact_us@bir.gov.ph</a></u>&nbsp;or you may visit their website at <a href="http://www.bir.gov.ph" target="_blank" class="outbound-link">www.bir.gov.ph</a></p><p><strong>BMBE Registration:</strong></p><p>Any business entity or&nbsp;enterprise involved in the production, processing or manufacturing of products or commodities, including&nbsp;agro-processing, trading and&nbsp;services not&nbsp;exceeding to 3 million is a&nbsp;Barangay Micro-Business Enterprise (BMBE) according to the Republic Act No. 9178 or the BMBEs Act of 2002.</p><p>The following government incentives can be utilized by a registered BMBE, namely: exemption from the payment of income tax for income arising from the operation of the enterprise, exemption from paying the minimum wage, special credit window of government financing institutions that will service the needs of BMBEs such as technology and marketing assistance.</p><p>To register an enterprise as a BMBE, please provide the following documentary requirements:</p><ul><li>Certificate of Business Name Registration from the Department of Trade and Industry (DTI), or</li><li>Certificate of Registration from the Securities and Exchange Commission (SEC), or</li><li>Certificate of Registration from the Cooperative Development Authority (CDA)</li><li>Accomplished&nbsp;application form for BMBE Certificate of Authority</li></ul><p>If requirements are completed, please follow the procedure for registration&nbsp;of&nbsp;<strong>BMBE&nbsp;Certificate of Authority</strong>:</p><ol><li>Go to the nearest&nbsp;Negosyo&nbsp;Center in your province, city, or municipality;</li><li>Submit the documentary requirements for the DTI, through the&nbsp;Negosyo&nbsp;Center, to evaluate the application for purposes of determining the eligibility and qualification as a BMBE;</li><li>If the applicant is eligible and qualified, the DTI shall issue the BMBE Certificate of Authority within fifteen (15) working days from receipt of application with complete requirements.</li></ol><p>The registration and issuance of BMBE Certificate of Authority is free. Moreover, the Negosyo Center may request additional requirements (e.g. I.D.&nbsp; size photo, government issued valid I.D., Mayor’s Permit, etc.)</p><p><strong>Mayor’s Permit:</strong></p><p>Mayor’s permit is one of the major requirements of the Philippine government to fully register a company in the Philippines. The issuance of the of the permit takes place in the municipality/city or local government unit (LGU) of the company or individual’s principal place of business.</p><p>To register for a Mayor’s permit, please visit the nearest Municipal’s office&nbsp;or local government unit (LGU)&nbsp;where your business is located.</p><p><strong>FDA:</strong></p><p>For queries about food safety, license to operate (LTO) and certificate of product registration (CPR) please refer to the Food and Drug Administration. You may visit their website at <u>http://www.fda.gov.ph</u></p><p><strong>DOST:</strong></p><p>For queries about packaging technology, design, labelling, testing and other packaging related concerns please refer to the Packaging Technology Division of Industrial Technology Development Institute, Department of Science and Technology.&nbsp; You may visit their website at&nbsp;<a href="http://www.itdi.dost.gov.ph" target="_blank" class="outbound-link">http://www.itdi.dost.gov.ph</a></p><p><strong>DENR:</strong></p><p>For queries about the application for Environmental Compliance Certificate and the Certificate of Non-Coverage (CNC), please refer to the Environmental Management Bureau of the Department of Environment and Natural Resources through their website, <a href="https://emb.gov.ph" target="_blank" class="outbound-link">http://www.emb.gov.ph</a></p></div>

          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
           FINANCING
          </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <div class="su-spoiler-content su-u-clearfix su-u-trim"><p><strong>How to apply for loans (P3 Program)?</strong></p><p>The <a href="https://www.dti.gov.ph/negosyo/p3/" target="_blank" rel="noopener noreferrer">Pondo sa Pagbabago at Pag-asenso (P3)</a> was created through the directions of President Rodrigo R. Duterte to alleviate the micro, small and medium enterprises (MSMEs) sector. P3 aims to give an alternative source of capital for the MSMEs to avoid the “5-6” lenders.</p><p>The business should be operational for a year or more, with valid government IDs and barangay clearance and should be registered in the Department of Trade and Industry, municipality, or barangay. Additional requirements include a proof of one-year business activity and an asset size of not exceeding P3.0 million. The P3 Program is open to any Filipino entrepreneur, fit to own a business and is near to any authorized lender. Through the P3 or Pondo sa Pagbabago at Pagasenso Program, Micro Borrowers may avail P5,000 up to P200,000 with no collateral needed. The interest will not be more than 2.5% per month. Micro borrowers may also access the list of accredited Partner MFis through the website www.sbgfc.org.ph. For further information, call or send an email to the Small Business Corporation at +632 751 1888, or <a href="mailto:p3@sbgfc.org.ph" target="_blank" class="outbound-link">p3@sbgfc.org.ph</a>.</p></div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
            MARKETING
          </button>
        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">

            <div class="su-spoiler-content su-u-clearfix su-u-trim"><p><strong>How to join the OTOP Program? </strong></p><p><a href="https://apac01.safelinks.protection.outlook.com/?url=https%3A%2F%2Fwww.dti.gov.ph%2Fprograms-projects%2Fotop&amp;data=02%7C01%7C%7C93d405a668b34d92e8b108d690a932d1%7C3ec114112a714a12ac80fbf93553f918%7C0%7C0%7C636855453726155928&amp;sdata=CCGql0hSLx9D68oZZVs4MwK7QhiirEKqj%2FgLfYuVsdI%3D&amp;reserved=0" target="_blank" rel="noopener noreferrer" class="outbound-link">ONE TOWN, ONE PRODUCT (OTOP) PHILIPPINES</a> is a priority stimulus program for Micro, Small and Medium-scale enterprises (MSMEs) as government’s customized intervention to drive inclusive local economic growth. The program enables localities and communities to determine, develop, support, and promote products or services that are rooted in its local culture, community resource, creativity, connection, and competitive advantage. As their own ‘pride-of-place,’ these are offerings where they can be the best at or best renowned for. It endeavours to capacitate our ‘OTOPreneurs’ to innovate and produce market-ready products and services.</p><p>OTOP Philippines has two components, namely: OTOP Next Gen and OTOP Philippines Hub. OTOP Next Gen refers to the package of assistance provided to capacitate the MSMEs. This component is primarily the product development initiatives, training, referral, and others with the goal of levelling up the products in the areas of design, quality, volume, among others. The basic requirement to be part of OTOP Next Gen is that your business should be running for at least 1 year with a viable product. OTOP.PH or OTOP Philippines Hub provides the physical and online channels and market access platform where OTOP products – especially those which has been assisted via product development – are showcased on a day-to-day basis. To be able top join the OTOP Philippine Hub, the product should have undergone product development given by OTOP Next Gen. Contact your local DTI (provincial or regional), and they will immediately assist you.</p></div>
          </div>
        </div>
      </div>



    </div>

  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

    <div class="entry-content">
      <h1 style="text-align: center;">CONTACT US</h1>
      <p>&nbsp;</p>
      <p style="text-align: center;"><strong>Place - Poblacion, Tagoloan Misamis Oriental, Philippines
      </strong>
          <br>Contact No. - 09958125884
          <br>
          Email - nc.tagoloanmisor@gmail.com
          <br>
          Negosyo Center Admin - Ms.Marisel E. Emano (MGDH-1, MEEDO/BPLO/NEGOSYO CENTER, LGU Tagoloan Misamis Oriental
          <br>
          City<br>Phone: (+632) 7791.3384<br>Fax: (+632) 751.3335 E-mail: negosyocenter@dti.gov.ph</p>
      <p style="text-align: center;">&nbsp;</p>
      <p style="text-align: center;"><strong>Office Hours:</strong><br>Monday to Friday <br>8:00 AM – 5:00 PM</p>
      <p></p>
    </div>




  </div>
</div>

