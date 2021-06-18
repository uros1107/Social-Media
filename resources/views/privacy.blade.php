@extends('layouts.front')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
h4, h3 {
    color: #e2e2e2;
}
p, li {
    font-size: 18px;
    color: #898989;
}
h4 {
    font-size: 24px;
}

h3 {
    font-size: 42px;
}
.content {
    background: #121212;
}
.container {
    height: 100%;
}
@media (max-width: 574px) { 
    .top {
        text-align: center;
        padding-top: 45px;
        position: initial!important;
    }
    h3 {
        font-size: 30px!important;
    }
    p, li {
        font-size: 16px;
        color: #898989;
    }
    h4 {
        font-size: 16px;
    }
    .row {
        padding-top: 35px!important;
    }
}
</style>
@endsection

@section('content')
<div class="content">
    <div class="container">
        <!-- desktop -->
        <div class="top">
            <a href="{{ route('index') }}"><img src="{{ asset('assets/images/top-left-img.png') }}"></a>
        </div>
        <div class="row" style="padding-top: 120px">
            <div class="col-12 col-sm-12 col-md-12 text-center mb-5">
                <h3>PRIVACY POLICY</h3>
            </div>
            <div class="col-12 col-sm-12 col-md-12">
                <h4>Last Updated: March 27, 2021</h4>
                <p>
                    Your privacy is important to us. Lumiworks Pte. Ltd. (collectively referred to hereinafter as “Lumiworks”,
                    “MillionK”, “we”, “us” or “our”) operates www.millionk.com (the “Platform”, “Website”). This Privacy
                    Policy is designed to assist you with understanding how we collect, use &amp; store the information you
                    provide us when accessing or using our platform. This Privacy Policy applies to anyone who uses the
                    platform, makes a transaction through the platform, reviews an order, signs up as a Talent/Partner on
                    our platform, or other online services or any of our described activities that we own or control
                    (collectively, the “Services”)</p></br>
                <p>
                    By using our Services, you acknowledge that you have read and agreed to the terms of this Privacy
                    Policy. If you do not want your personal data handled as described in this Privacy Policy, please do not
                    provide us with your personal data or interact with the Services. If you choose not to provide the
                    necessary personal data to us, we may not be able to provide you with the Services or allow you to set
                    up an account.
                </p></br>
                <p>
                    We take our responsibilities under data protection and privacy laws seriously, including but not limited
                    to our responsibilities under Singapore’s Personal Data Protection Act 2012 (the “PDPA”).
                </p><br>

                <h4>CHANGES IN OUR PRIVACY POLICY</h4>
                <p>
                    We may change this Privacy Policy in our sole discretion at any time. Any revisions to this Privacy Policy will be posted on our website. Users of our website agree that it is their obligation to visit our website to review any changes that may be made to this Privacy Policy in addition to other documents within the website. Your continued use of the website constitutes your agreement to be bound by such changes to the Privacy Policy. If you do not agree to these changes to the Privacy Policy, you shall exit the Website and will not be authorized to use our Website. We will notify you of any changes to this Privacy Policy only when required by the law.
                </p></br>

                <h4>COLLECTION & PURPOSE OF PERSONAL DATA</h4>
                <p>
                When you visit our Website, you agree to provide us with two types of information: personal information that you voluntarily disclose that is collected on an individual basis (Personal Data); and information collected automatically when you use our Website or the services available on our Website (collectively, the “Information”).
                Personal Data means any information that is unique to you, such as your Name, Username, Password, Email Address, Mailing Address, Contact Details & other personal information you choose to provide. By providing us with your personal data, you also consent for us to collect, hold, use and disclose your personal data in accordance with the Privacy Policy. Your personal data is collected in certain situations, such as (but not limited) to signing up as a member of our website or when subscribing for our newsletter, or in the addition to other services provided on our Website.
                We will collect your Personal Data in accordance with the PDPA. We will notify you of the purposes for which your Personal Data may be collected, used, disclosed and/or processed, as well as obtain your consent for the collection, use, disclosure and/or processing of your Personal Data for the intended purposes, unless an exception under the law permits us to collect, use and/or disclose your Personal Data without your consent.
                The Personal Data which we collect from you may be collected, used, disclosed and/or processed for various purposes, depending on the circumstances for which we may/will need to process your Personal Data, including but not limited to:</p>
                <ul class="text-white">
                    <li>
                        analysing and tracking data, trends, usage & activities to determine the usefulness or popularity of certain content and to better understand the online activity of our Website users;
                    </li>
                    <li>
                        fulfilling our legal or regulatory requirements and any other requested procedures;
                    </li>
                    <li>
                        providing you with the information of our products or services;
                    </li>
                    <li>
                        providing, maintaining, delivering or improving our Website, Mobile App or the products or services provided by us or our partners;
                    </li>
                    <li>
                        answering your inquiry or responding to a communication from you;
                    </li>
                    <li>
                        developing new products or services;
                    </li>
                    <li>
                        contacting you or communicating with you via telephone call, text message, fax message, email and/or postal mail for the purposes of processing, administering and managing your membership with us;
                    </li>
                    <li>
                        administering lucky draws, contests or promotions which you have participated in or signed up for;
                    </li>
                    <li>
                        administering and maintaining the functions and features of the Website;
                    </li>
                    <li>
                        processing any transactions or payments made by you and to maintain payment records;
                    </li>
                    <li>
                        for publicity purposes and conducting research, analysis and development activities (including but not limited to data analytics, surveys and/or profiling) to improve our services and facilities in order to enhance the services we provide to you, where you have consented for us to do so;
                    </li>
                    <li>
                        Publicity and promotion with a view to marketing our business, where you have consented for us to do so. In this regard, your Personal Data will be processed by us for the purpose of conducting publicity and/or the development of promotional materials for use by us, such as but not limited to publication of your image and Personal Data on public media platforms such as the newspaper, the Internet, magazines, our in-house notice boards, our newsletters, social media platforms etc;
                    </li>
                    <li>
                        sending you technical notices, support or administrative notifications;
                    </li>
                    <li>
                        responding to legal process, pursuing legal rights and remedies, defending litigation & managing any complaints or claims;
                    </li>
                    <li>
                        record-keeping purposes;
                    </li>
                    <li>
                        communicating with you about news, products, services, events and other information we think will be of interest to you or required to be received from you;
                    </li>
                    <li>
                        matching your information with open data and other resources;
                    </li>
                    <li>
                        detecting, investigating & preventing potential fraudulent or unauthorized or illegal transactions or activities;
                    </li>
                    <li>
                        linking, connecting or combining information we collect from or about you with other information;
                    </li>
                    <li>
                        carrying out any other purpose or reason for which the information was collected;
                    </li>
                    <li>
                        complying with any applicable local laws in Singapore, the regulation, legal process or government request
                    </li>
                    <li>
                        considering your application for your partnership application (in order to work with us as a MillionK Partner or Talent) & the usage of such information in the application
                    </li>
                    <li>
                        As the purposes for which we may/will collect, use, disclose or process your Personal Data depend on the circumstances at hand, such purpose may not appear above. However, we will notify you of such other purpose at the time of obtaining your consent, unless processing of your Personal Data without your consent is permitted by the PDPA or by law.
                    </li>
                </ul>

                <h4>SHARING OF INFORMATION</h4>
                <p>You empower us and we will share Information about you in the following cases:</p>
                <ul class="text-white">
                    <li>with your consent or at your instruction;</li>
                    <li>with our current or future parent companies, affiliates, subsidiaries and with other companies under common control or ownership with us or our offices internationally;</li>
                    <li>with third parties or service providers that perform work for us;</li>
                    <li>certain information you may choose to share may be displayed publicly, such as your username and any content you post when you use interactive areas of our Website;</li>
                    <li>in connection with a merger, assign or sale of our company assets, or if we do a financing or are involved in an acquisition or any other situation where Information may be disclosed;</li>
                    <li>in response to a request for information if we believe disclosure is in accordance with, or required by, any applicable law, regulation or legal process;</li>
                    <li>if we believe your actions are inconsistent with our user agreements or policies, or to protect the rights, property and safety of any Party or others; and</li>
                    <li>with third parties where aggregate Information is disclosed which cannot be reasonably be used to identify you.</li>
                </ul>
                <p>Your Personal Data may be used, disclosed, maintained, accessed, processed and/or transferred to the following third parties, whether sited in Singapore or outside of Singapore, for one or more of the Purposes:</p>
                <p>Lumiwork Pte. Ltd.’s office, affiliates and subsidiaries;
                    any of our agents, contractors or third party service providers that process or will be processing your Personal Data on our behalf including but not limited to those third party service providers which have been engaged by us to : (i) to provide and maintain any IT equipment used to store and access your personal information; (ii) to operate and maintain features on the Site; or (iv) otherwise in connection with the provision of membership or subscription services to you;
                    Lumiwork Pte. Ltd.’s auditors and legal advisors;
                    financial institutions, credit card companies and payment processors; and
                    public and governmental / regulatory authorities, courts and other alternative dispute forums,
                    (the “Permitted Parties”).
                </p>

                <h4>STORING OF PERSONAL DATA</h4>
                <p>Personal data will be held for as long as necessary to fulfill the purpose for which it was collected or as required or permitted by applicable laws. We shall cease to retain personal data, or remove the means by which the personal data can be associated with particular individuals, as soon as it is reasonable to assume that the purpose for which that personal data was collected is no longer being served by retention of the personal data and retention is no longer necessary for legal or business purposes. Your data will be stored within or outside Singapore. 
                You may request us to provide you your personal data that we are holding and how we are using it. Please contact us at hello@millionk.com for this purpose.
                </p>

                <h4>PROTECTION & SECURITY OF PERSONAL INFORMATION</h4>
                <p>We take reasonable steps to protect the security of the information communicated through our Website. However, no computer security system is entirely foolproof and the internet is not a secure method of transmitting information. We do not assume any responsibility for the data you submit to or receive from us through the internet or for any unauthorised access or use of that information and we cannot and do not guarantee that information communicated by you to us or sent to you by us will be received or that it will not be altered before or after its transmission to us. You agree to not hold us and our respective past, present and future employees, officers, directors, contractors, consultants, equity holders, suppliers, vendors, service providers, parent companies, subsidiaries, affiliates, agents, representatives, predecessors, successors and assigns (collectively the “Parties” – Lumiworks Pte. Ltd.& Related Parties) liable for any loss or damage of any sort incurred as a result of any misappropriation, interception, modification, deletion, destruction or use of information provided through our Website.</p>

                <h4>WHAT INFORMATION IS COLLECTED AUTOMATICALLY?</h4>
                <p>When you use our Website or services available on our Website, we automatically collect information from your devices. We collect the following information:</p>
                <ul class="text-white">
                    <li>
                    Server Log Information: We collect server log information when you use our Website, which may include (but is not limited to) your login details, the date and time of visits, the pages viewed, your IP address, time spent at our Website and the websites you visit just before and just after our Website.
                    </li>
                    <li>
                    Device Information: We collect information about the computer or mobile device you use to access our Website, including the hardware model, operating system and version, the web browser you use, and other device identifiers.
                    </li>
                    <li>
                    Telemetry Information. If you use any of our open source software, we may collect bandwidth upload and download speeds, the amount of free and used storage space on your device and other statistics about your device.
                    </li>
                    <li>
                    Usage Information. If you use our Website, we will collect metadata about the files you upload for storage and we will record instances in which you have used your private key to authenticate communications.
                    </li>
                    <li>
                    Information Collected by Cookies and Other Tracking Technologies: We and our service providers use various technologies to collect information when you interact with our Website, including cookies and web beacons. Cookies are small data files that are stored on your device when you visit a website, which enable us to collect information about your device identifiers, IP address, web browsers used to access the Website, pages or features viewed, time spent on pages, mobile app performance and links clicked. Web beacons are graphic images that are placed on a website or in an email that is used to monitor the behaviour of the user visiting the website or sending the email. They are often used in combination with cookies.
                    </li>
                    <li>
                    All points applied above (Server Log Information, Device Information, Telemetry Information, Usage Information, Information Collected by Cookies and Other Tracking Technologies) may also apply to our mobile app
                    </li>
                </ul>
                <p>
                Most web browsers are set to accept cookies as a default. You may wish to opt out by turning off cookies (please refer to the help menu on your browser); however, switching off cookies may restrict your use of our Website.
                You may also opt out of receiving promotional communications from us at any time by following the instructions in those communications. If you opt out, we may still send you non-promotional communications, such as technical notices, support or administrative notifications or information about your account (if you have one).
                </p>
                <p>
                Personal Data (if any) that we collect from you through cookies may be passed to our third party service providers, whether located in Singapore or elsewhere, for one or more of the Purposes (see above), for managing and/or administering our website, or for the purpose of data hosting/storage/backup.
                Your use of this Site constitutes consent by you to our use of cookies and to the matters set out herein.
                </p>

                <h4>LINKS TO OTHER SITES</h4>
                <p>Our Site may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the terms and conditions as well as the privacy policy of every site you visit.
                    Lumiworks Pte.Ltd. has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party sites or services.
                </p>

                <h4>REQUEST TO WITHDRAW CONSENT</h4>
                <p>You may withdraw your consent for the collection, use and/or disclosure of your Personal Data in our possession or under our control (including your consent for the use of your Personal Data for direct marketing) by submitting your request to the contact email address set out below.
                We will process your request within a reasonable time from such a request for withdrawal of consent being made, and will thereafter not collect, use and/or disclose your Personal Data in the manner stated in your request.
                However, your withdrawal of consent could result in certain legal consequences arising from such withdrawal. In this regard, depending on the extent of your withdrawal of consent for us to process your Personal Data, it may mean that we will not be able to continue with your existing relationship with us.
                </p>

                <h4>CONTACT US</h4>
                <p>
                If you, at any time, have any queries on this policy or any other queries in relation to how we may manage, protect and/or process your Personal Data, please do not hesitate to contact us at hello@millionk.com  
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection
