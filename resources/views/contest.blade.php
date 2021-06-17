@extends('layouts.front')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
h4, h3, h5 {
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
    .row {
        padding-top: 35px!important;
    }
    h3 {
        font-size: 32px!important;
    }
}
</style>
@endsection

@section('content')
<div class="content">
    <div class="container" style="background-color: #121212;">
        <!-- desktop -->
        <div class="top">
            <a href="{{ route('index') }}"><img src="{{ asset('assets/images/top-left-img.png') }}"></a>
        </div>
        <div class="row" style="padding-top: 120px">
            <div class="col-12 col-sm-12 col-md-12 text-center mb-5">
                <h3>MILLIONK CONTEST OFFICIAL RULES</h3>
            </div>
            <div class="col-12 col-sm-12 col-md-12">

                <p><strong>1. Eligibility</strong>: This Campaign is open only to those who follow our Instagram page at
                    <a href="https://www.instagram.com/millionk.official/">https://www.instagram.com/millionk.official/</a> & who like the contest post & tag 3 friends
                    and who are 18 years of age or older as of the date of entry. The Campaign is open
                    worldwide and is void where prohibited by law. Employees of Lumiworks Pte. Ltd., its
                    affiliates, subsidiaries, advertising and promotion agencies, and suppliers, (collectively
                    the “Employees”), and immediate family members and/or those living in the same
                    household of Employees are not eligible to participate in the Campaign. The Campaign
                    is subject to all applicable federal, state, and local laws and regulations. Void where
                    prohibited.
                </p>
                <p><strong>2. Agreement to Rules</strong>: By participating, the Contestant (“You”) agree to be fully
                    unconditionally bound by these Rules, and You represent and warrant that You meet the
                    eligibility requirements. In addition, You agree to accept the decisions of Lumiworks Pte.
                    Ltd. as final and binding as it relates to the content of this Campaign.
                </p>
                <p><strong>3. Campaign Period:</strong>
                    Entries will be accepted online starting on 15th of June 2021, 2359
                    and ending 23rd of June 2021 2359. All online entries must be received by the end
                    date.
                </p>
                <p><strong>4. How to Enter</strong>: The Campaign must be entered by following both steps on our
                    Instagram Contest post. The entry must fulfill all Campaign requirements, as specified,
                    to be eligible to win a prize. Entries that are incomplete or do not adhere to the rules or
                    specifications may be disqualified at the sole discretion of Lumiworks Pte. Ltd.Optional
                    verbiage to include: You may enter only once. You must provide the information
                    requested. You may not enter more times than indicated by using multiple email
                    addresses, identities, or devices in an attempt to circumvent the rules. If You use
                    fraudulent methods or otherwise attempt to circumvent the rules, your submission may
                    be removed from eligibility at the sole discretion of Lumiworks Pte. Ltd.
                </p>
                <p><strong>5. Prizes</strong>: 5 Winner(s) of the Campaign (the “Winners”) will receive a platform credit
                    worth US$100. Actual/appraised value may differ at time of prize award. No cash or
                    other prize substitution shall be permitted except at Lumiwork Pte. Ltd.discretion. The
                    prize is nontransferable. Any and all prize-related expenses, including without limitation
                    any and all federal, state, and/or local taxes, shall be the sole responsibility of Winner.
                    No substitution of prize or transfer/assignment of prize to others or request for the cash
                    equivalent by Winner is permitted. Acceptance of prize constitutes permission for
                    Lumiworks Pte. Ltd. to use Winner’s name, likeness, and entry for purposes of
                    advertising and trade without further compensation unless prohibited by law.
                </p>
                <p><strong>6. Odds</strong>: The odds of winning depend on the number of eligible entries received.</p>
                <p><strong>7. Winner Selection and Notification</strong>: Winner will be selected by a random drawing
                    under the supervision of Lumiworks Pte. Ltd.. Winner will be notified by Instagram DM
                    within five (5) days following selection of Winner. Lumiworks Pte. Ltd. shall have no
                    liability for Winner’s failure to receive notices due to spam, junk e-mail, or other security
                    settings or for Winner’s provision of incorrect or otherwise non-functioning contact
                    information. If Winner cannot be contacted, is ineligible, fails to claim the prize within 5
                    days from the time award notification was sent, or fails to timely return a completed and
                    executed declaration and release as required, the prize may be forfeited and an
                    alternate Winner selected. Receipt by Winner of the prize offered in this Campaign is
                    conditioned upon compliance with any and all federal, state, and local laws and
                    regulations. ANY VIOLATION OF THESE OFFICIAL RULES BY WINNER (AT
                    LUMIWORKS PTE. LTD.‘S SOLE DISCRETION) WILL RESULT IN WINNER’S
                    DISQUALIFICATION AS WINNER OF THE CAMPAIGN, AND ALL PRIVILEGES AS
                    WINNER WILL BE IMMEDIATELY TERMINATED.
                </p>
                <p><strong>8. Rights Granted by You</strong>: By entering this content (e.g., photo, video, text, etc.), You
                    understand and agree that Lumiworks Pte. Ltd. anyone acting on behalf of Lumiworks
                    Pte. Ltd., and Lumiworks Pte. Ltd.’s licensees, successors, and assigns, shall have the
                    right, where permitted by law, to print, publish, broadcast, distribute, and use in any
                    media now known or hereafter developed, in perpetuity and throughout the World,
                    without limitation, your entry, name, portrait, picture, voice, likeness, image, statements
                    about the Campaign, and biographical information for news, publicity, information, trade,
                    advertising, public relations, and promotional purposes. without any further
                    compensation, notice, review, or consent. Optional verbiage for Contests: By entering
                    this content, You represent and warrant that your entry is an original work of authorship,
                    and does not violate any third party’s proprietary or intellectual property rights. If your
                    entry infringes upon the intellectual property right of another, You will be disqualified at
                    the sole discretion of Lumiworks Pte. Ltd.. If the content of your entry is claimed to
                    constitute infringement of any proprietary or intellectual proprietary rights of any third
                    party, You shall, at your sole expense, defend or settle against such claims. You shall
                    indemnify, defend, and hold harmless Lumiworks Pte. Ltd. from and against any suit,
                    proceeding, claims, liability, loss, damage, costs or expense, which Lumiworks Pte. Ltd.
                    may incur, suffer, or be required to pay arising out of such infringement or suspected
                    infringement of any third party’s right.
                </p>
                <p><strong>9. Terms & Conditions</strong>: Lumiworks Pte. Ltd.reserves the right, in its sole discretion, to
                    cancel, terminate, modify or suspend the Campaign should virus, bug, non-authorized
                    human intervention, fraud, or other cause beyond Lumiworks Pte. Ltd.’s control corrupt
                    or affect the administration, security, fairness, or proper conduct of the Campaign. In
                    such case, Lumiworks Pte. Ltd. may select the Winner from all eligible entries received
                    prior to and/or after (if appropriate) the action taken by Lumiworks Pte. Ltd. Lumiworks
                    Pte. Ltd. reserves the right, in its sole discretion, to disqualify any individual who
                    tampers or attempts to tamper with the entry process or the operation of the Campaign
                    or website or violates these Terms & Conditions. Lumiworks Pte. Ltd.has the right, in its
                    sole discretion, to maintain the integrity of the Campaign, to void votes for any reason,
                    including, but not limited to: multiple entries from the same user from different IP
                    addresses; multiple entries from the same computer in excess of that allowed by
                    Campaign rules; or the use of bots, macros, scripts, or other technical means for
                    entering. Any attempt by an entrant to deliberately damage any website or undermine
                    the legitimate operation of the Campaign may be a violation of criminal and civil laws.
                    Should such an attempt be made, Lumiworks Pte. Ltd.reserves the right to seek
                    damages to the fullest extent permitted by law.
                </p>
                <p><strong>10. Limitation of Liability</strong>: By entering, You agree to release and hold harmless
                    Lumiworks Pte. Ltd. and its subsidiaries, affiliates, advertising and promotion agencies,
                    partners, representatives, agents, successors, assigns, employees, officers, and
                    directors from any liability, illness, injury, death, loss, litigation, claim, or damage that
                    may occur, directly or indirectly, whether caused by negligence or not, from: (i) such
                    entrant’s participation in the Campaign and/or his/her acceptance, possession, use, or
                    misuse of any prize or any portion thereof; (ii) technical failures of any kind, including
                    but not limited to the malfunction of any computer, cable, network, hardware, or
                    software, or other mechanical equipment; (iii) the unavailability or inaccessibility of any
                    transmissions, telephone, or Internet service; (iv) unauthorized human intervention in
                    any part of the entry process or the Promotion; (v) electronic or human error in the
                    administration of the Promotion or the processing of entries.
                </p>
                <p><strong>11. Disputes</strong>: THIS Campaign IS GOVERNED BY THE LAWS OF SINGAPORE
                    WITHOUT RESPECT TO CONFLICT OF LAW DOCTRINES. As a condition of
                    participating in this Campaign, participant agrees that any and all disputes that cannot
                    be resolved between the parties, and causes of action arising out of or connected with
                    this Campaign, shall be resolved individually, without resort to any form of class action,
                    exclusively before a court located in SINGAPORE having jurisdiction. Further, in any
                    such dispute, under no circumstances shall participant be permitted to obtain awards
                    for, and hereby waives all rights to, punitive, incidental, or consequential damages,
                    including reasonable attorney’s fees, other than participant’s actual out-of-pocket
                    expenses (i.e. costs associated with entering this Campaign). Participant further waives
                    all rights to have damages multiplied or increased.
                </p>
                <p><strong>12. Privacy Policy</strong>:  Information submitted with an entry is subject to the Privacy Policy
                    stated on the Lumiworks Pte. Ltd.website. To read the Privacy Policy,
                    <a href="https://millionk.com/privacy">https://millionk.com/privacy</a> click here. Note: a privacy policy is optional, but may be
                    required when running a promotion on the web when using third party platforms or when
                    using features from social channels. Including this information makes it clear to your
                    users how you are going to use their information.
                </p>
                <p><strong>13. Sponsor</strong>: The Sponsor of the Campaign is Lumiworks Pte. Ltd.</p>
                <p>14. Not sponsored, endorsed, administered by, or associated with,Facebook, Instagram or Google,
                    LLC (“Google”). Lumiworks Pte. Ltd. (“Sponsor”) is not affiliated with Instagram,Facebook or Google
                    in any way.
                </p>
                <p>16. NO PURCHASE IS NECESSARY TO ENTER OR WIN. A PURCHASE DOES NOT
                    INCREASE THE CHANCES OF WINNING.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection
