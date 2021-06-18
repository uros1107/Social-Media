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
    font-size: 20px;
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
        font-size: 20px!important;
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
                <h3>Frequently Asked Questions (FAQ)</h3>
            </div>
            <div class="col-12 col-sm-12 col-md-12">
                <h4>Q: What is MillionK?</h4>
                <p>
                    A: MillionK is a platform where fans can book personalised video messages and services from their
                    favourite talents. We aim to create the most personalised and authentic fan service site for Korean wave
                    influencers and idols around the world.</p>

                <h4>Q: Why use MillionK?</h4>
                <p>
                    A: Wouldn’t it be cool to finally be able to reach out to your favourite Korean wave artists and
                    influencers out there? After years of searching for a solution for international fans like ourselves and you
                    we have finally come up with a solution – MillionK. Something as personal as a personalised fan service
                    video in the form of a motivational pep talk, birthday wishes or even as something as simple as a simple
                    greeting has the potential to transform your everyday life or the life your friend.
                </p>

                <h4>Q: How do I contact the MillionK team?</h4>
                <p>
                    A: Simply drop us an electronic letter at <a href="mailto:hello@millionk.com">hello@millionk.com</a>.  We will be happy to get back to you as soon as possible.</p>

                <h4>Q: How does MillionK work?</h4>
                <p>A: Simply pick your favourite from our list of talents. Secondly, fill in your request (i.e. fighting/motivational video, birthday shout-out, well wishes or just to get advice). Then, your personalised video will be delivered within 7 days of booking. </p>

                <h4>Q: How much does it cost for each MillionK personalised video?</h4>
                <p>A: The cost of a personalised video is set individually by our talent, so it depends on which talent you have requested the video from. The price is shown on the booking page of every Talent.
                </p>

                <h4>Q: How will I receive my MillionK video?</h4>
                <p>A: A link will be sent to your email that you provided when you ordered your personalised video. You can then login to our platform and download the video.</p>

                <h4>Q: Am I guaranteed that the talent I select will make my requested personalised video?</h4>
                <p>A: We make it our main aim that every client of ours receives their desired, personalised video. In some instances, it is possible that your request may expire. Our talent has the option to accept or decline any request(s) that come through. </p>

                <h4>Q: When will I be charged for my MillionK video?</h4>
                <p>A: When you book your MillionK personalised video, we will put a hold on your credit/debit card as an authorization until the order is completed. Once your order has been fulfilled and the personalised video has been sent to you, your credit/debit card will be charged. If your request is not completed, the authorization will be released, and you should see the hold removed from your credit/debit card up to seven days after the request has expired.
                </p>

                <h4>Q:  Can I share my MillionK Video on social media & with my friends?</h4>
                <p>A: Yes you can. As long as it’s for non-commercial and personal usage, you can share the video subject to our Terms of Service. 
                </p>

                <h4>Q: Am I able to cancel or update my request after I have already placed a booking? </h4>
                <p>
                A: Yes you can. As long as your request has not been fulfilled, you can edit or cancel your order.
                </p>

                <h4>Q: If I am a K-Wave celebrity or influencer, how can I join MillionK? </h4>
                <p>
                A: Approach us via email at <a href="mailto:vip@millionk.com">vip@millionk.com</a> and we will get back to you as soon as possible. You can also click on the ‘Enroll as Talent’ on our platform and fill in the form accordingly. 
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection
