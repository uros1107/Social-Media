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
                <h3 style="text-decoration:underline">Holiday 2020 Surprise Cameo Live Sweepstakes</h3>
                <h3>Official Rules</h3>
            </div>
            <div class="col-12 col-sm-12 col-md-12">
                <p>No purchase necessary to enter or win. A purchase will not increase your chances of winning. Void where prohibited by law.</p>
                <p>Not sponsored, endorsed, administered by, or associated with, Zoom Video Communications, Inc. ("Zoom") or Google, LLC ("Google"). Baron App, Inc. dba Cameo ("Sponsor") is not affiliated with Zoom or Google in any way.</p>
                <p>By entering, you agree to abide by and be bound by Sponsor’s Site Terms of Service <a href="https://www.cameo.com/terms">www.cameo.com/terms</a> ("Site Terms"), Sponsor’s Privacy Policy <a href="https://www.cameo.com/privacy">www.cameo.com/privacy</a> ("Privacy Policy"), and these Official Rules, which create a contract. Please read them carefully.</p>

                <p><strong>1. Eligibility</strong>: The Holiday 2020 Surprise Cameo Live Sweepstakes (the “Sweepstakes”) is open only to legal residents of the 50 United States (or the District of Columbia) who are 18 years of age or older (19 years or older if a resident of AL or NE). Each entrant shall be referred to herein as a “Participant”. Employees, officers and directors of Sponsor, its affiliates, subsidiaries, promotion and advertising agencies, anyone involved in the design, execution or fulfillment of this Sweepstakes, and members of the immediate families (defined as including spouse, biological, adoptive and step-parents, grandparents, siblings, children and grandchildren, and each of their respective spouses, regardless of where they reside) or households (whether related or not) of any of the above are not eligible to enter. Non-eligibility or non-compliance with any of these Official Rules will result in disqualification. By participating in the Sweepstakes, Participant fully and unconditionally agrees to and accepts these Official Rules and the decisions of Sponsor, which are final and binding in all matters related to the Sweepstakes.</p>
                <p><strong>2. Promotion Period</strong>: The Sweepstakes begins at 09:01 a.m. Central Time ("CT") on December 14, 2020 and ends at 08:59 a.m. CT on December 15, 2020 (the "Promotion Period"). </p>
                <p><strong>3. How to Enter:</strong><br>
                    <ul class="text-white">
                        <li>
                            To enter, Participant must input the following information into the talent-specific Google form: full name, contact information, and write a brief response to the prompts “in 200 words or less, tell us about the frontline worker you are nominating for a chance to win a surprise Zoom call on 12/17/2020 with one of their favorite celebrities?” and “in 200 words or less, tell us about the top three participating Talent you chose and why they would be great as a surprise Cameo for the frontline worker you nominated?”
                        </li>
                        <li>
                            The entry form may be found at the following link: <a href="https://docs.google.com/forms/d/e/1FAIpQLSe53L6Afm2i5KdPzZA6GUh2Qk75EzI9Rab7nWvo_X7L2kCyWA/viewform">https://docs.google.com/forms/d/e/1FAIpQLSe53L6Afm2i5KdPzZA6GUh2Qk75EzI9Rab7nWvo_X7L2kCyWA/viewform</a>
                        </li>
                        <li>
                            <strong>Note</strong>: Cameo is not responsible for errors in submissions or other issues that affect its ability to identify an eligible entry
                        </li>
                        <li>
                            <strong>Limit one (1) entry per person. </strong>Use of any automated system to participate is prohibited and will result in disqualification. Any attempt by any Participant to obtain more than the permissible number of entries per day by using multiple email addresses, identities, or any other methods will void that Participant’s entries and that Participant will be disqualified.
                        </li>
                        <li>
                            All entries must comply with the Entry Guidelines set forth herein, or they will be disqualified.
                        </li>
                    </ul>
                </p>
                <p><strong>4. Entry Guidelines</strong>: This is a Sweepstakes for frontline workers, and thus the Sweepstakes objective is to surprise the frontline workers. Any entries that do not conform to this objective, in the sole discretion of Sponsor, will be disqualified. The prompt response in your entry must be your original creation, and must not, in the opinion of Sponsor: be indecent, obscene, hateful, tortious, defamatory, libelous; include any material that violates or infringes another’s rights; disparage Sponsor, any celebrity, or any other party; or contain material that is unlawful in any way. Your entry must not contain brand names or trademarks other than those owned by Sponsor. Sponsor reserves the right to disqualify any entry it deems in violation of the Site Terms, of these Official Rules, or offensive in any way and therefore not suitable for inclusion in the Sweepstakes, all in its sole discretion.</p>
                <p><strong>5. Drawings</strong>: One potential winner for each participating Talent will be selected in a random drawing from among all eligible entries for that Talent on December 15, 2020. The drawing will be conducted by the Sponsor. The potential winner will be notified via email provided at entry. <strong>Once the potential winner has been notified via email, they will have five (5) hours to respond to the Sponsor. If the potential winner fails to respond within five (5) hours, Sponsor reserves the right to disqualify the winner and select an alternate potential winner in a random drawing from among all remaining eligible entries received. </strong>If the potential winner is unable to accommodate the time slot available to the Talent, as listed in the entry form, the potential winner will be disqualified, and an alternate potential winner will be selected in a random drawing from among all remaining eligible entries received. If necessary, this process will be repeated up to five times, after which the prize will not be awarded if it remains unclaimed.</p>
                <p><strong>6. Winner Notification/Conditions</strong>: Winning is contingent upon fulfilling all requirements of, and continued compliance with, these Official Rules. The potential winners will be required to sign and return to Sponsor, <strong>within five (5) hours</strong> of the date notice or attempted notice is first sent, an Affidavit of Eligibility, a Liability Release and, where permitted by law, a Publicity Release (collectively, “Release”), and to fulfill any such other requirements as determined by Sponsor, as a condition of claiming the Prize (defined below). In the event that the potential winners cannot be contacted, fail to complete the Release in the required time period, forfeits the Prize for any reason, cannot accept or declines to accept the Prize, or is disqualified for any reason, Sponsor will select alternate potential winners in a random drawing from among all remaining eligible entries received. Prize will be fulfilled on December 17, 2020. The time the Prize is executed will be coordinated between Talent, Sponsor, and the winners. Execution of the Prize will be dependent upon verification of the winners’ eligibility, return of the executed Release, compliance with Sponsor’s Site Terms, and compliance with these Official Rules.</p>
                <p><strong>7. Prize</strong>: Each winner will receive one (1) (approximately) ten (10) minute live Zoom video chat with a specific Talent valued at approximately US$400, subject to standard Site Terms of Service, available at <a href="https://www.cameo.com/terms">www.cameo.com/terms</a> (the “Prize”). Approximate Retail Value (“ARV”) of all Prizes: US$2,800. Winners are responsible for all federal, state and local income taxes on the Prize, and for any associated costs that are not included in the Prize description above. Odds of winning depend upon number of eligible entries received. Winner may include up to six (6) additional personal acquaintances in the Prize, subject to Sponsor’s sole discretion. Each personal acquaintance hereby agrees to be subject to these Official Rules and the Site Terms.</p>
                <p><strong>8. Publicity</strong>: Except where prohibited, participation in the Sweepstakes constitutes Participant’s consent for Sponsor to use entrant’s name, likeness, Sweepstakes entry, Prize information (if applicable), any comments, testimonials or other feedback related to Prize (if applicable) or to the Sweepstakes experience, generally, whether written or oral, for promotional, advertising or commercial purposes in any media universally, without limitation and without further notice, approval or consideration.</p>
                <p><strong>9. Rights Granted</strong>: Submitting an entry constitutes Participant’s consent to give Sponsor a royalty-free, irrevocable, perpetual, non-exclusive license to use, reproduce, modify, publish, create derivative works from, and display such entry (and any other participation or Submission) in whole or in part, on a universal basis, and to incorporate it into other works, in any form, media or technology now known or later developed, for any purposes, including but not limited to commercial, promotional or marketing purposes. If requested, Participant must sign any documentation that may be required for Sponsor or its designees to make use of the non-exclusive rights Participant is granting herein. By entering, each Participant acknowledges and agrees that he/she will not receive compensation for his/her entry.</p>
                <p class="pl-4" style="font-style: italic">If selected as a winner, Participant acknowledges and agrees that delivery of the Prize is contingent upon return of the executed Release, defined above, which, in addition to the rights granted under the Site Terms, gives Sponsor the exclusive (including exclusive as to you), royalty-free, fully paid, unlimited, universal, sublicensable (through multiple tiers of sublicenses), irrevocable license in any and all manner and media to use, publish, reproduce, record, modify, edit, and display your name, image, voice, appearance, performance, likeness, and entry (and any other participation or Submission) in connection with the Prize and Sweepstakes, including advertising, marketing, promoting, republishing, rebroadcasting, and re-airing the Prize. By entering, each Participant acknowledges and agrees that he/she will not receive compensation for his/her Participation as listed above. If winner decides to include personal acquaintances in the Prize, the personal acquaintances hereby agree and acknowledge to be subject to these Official Rules and the Site Terms.</p>
                <p><strong>10. General Conditions</strong>: If an entry was made in a manner which, in Sponsor’s sole discretion, Sponsor believes to be unfair or violative of these Official Rules, the Participant responsible for such acts will be disqualified from the Sweepstakes. The Prize is neither transferable nor redeemable for cash; no prize substitutions allowed except by Sponsor, who may substitute a prize (or portion thereof) of equal or greater value if the advertised prize (or portion thereof) becomes unavailable. No more than the intended number of Prizes will be awarded. If, due to a production, technical, human or other error, the number of Prize notifications exceeds the intended number of Prizes as stated in these Official Rules, then the intended number of prizes will be awarded in a random drawing from among all legitimate recipients of such notifications. If a potential winner is unable to accommodate the time selection stated (available in the entry form) for the talent, another winner will be selected.</p>
                <p><strong>11. Release and Limitations of Liability</strong>: Except where prohibited, by participating in the Sweepstakes, Participants agree to release and hold harmless Baron App, Inc. dba Cameo, Zoom, Google, and their respective subsidiaries, affiliates, promotional partners, prize partners, agents and agencies, and the respective officers, directors and employees of each of the foregoing (collectively, the “Released Parties”) from and against any claim or cause of action arising out of participation in the Sweepstakes or receipt or use of the Prize (if applicable), including, but not limited to: (a) unauthorized human intervention in the Sweepstakes; (b) technical errors; (c) errors in the administration of the Sweepstakes or the transmission, receipt or the processing of entries; (d) any defect in a Prize or inability to participate in the Sweepstakes, (e) injury or damage to persons or property which may be caused, directly or indirectly, in whole or in part, from Participant’s participation in the Sweepstakes or the receipt, acceptance, delivery, possession, use or misuse of the Prize (if applicable); (f) any typographical or other error in any printing or advertising relating to the Sweepstakes, in the administration or execution of the Sweepstakes, or in the announcement of the Prize winners; or (g) cheating or fraud by any Participant. All incomplete or non-conforming entries will be disqualified.</p>
                <p class="pl-4" style="font-style: italic">If for any reason the Sweepstakes cannot be executed as planned, including but not limited to any printing, administrative, human or other error of any kind, transmission failure, infection by computer virus, bugs, tampering, unauthorized intervention, fraud, technical failures or errors, social media mandate, or any other causes beyond the control of Sponsor that corrupt or affect the security, administration, fairness, integrity or proper conduct of the Sweepstakes, or if the Sweepstakes is compromised or becomes corrupted in any way, electronically or otherwise, Sponsor reserves the right, in its sole discretion, to cancel, terminate, modify or suspend the Sweepstakes without notice. If the Sweepstakes is terminated prior to the stated end date of the Promotion Period, then the Prize[s] will be awarded in a random drawing from among all eligible, non-suspect entries received through both entry methods combined prior to the time/date of termination.</p>
                <p class="pl-4" style="font-style: italic">Sponsor reserves the right, in its sole discretion, to disqualify any individual who tampers with or attempts to tamper with the entry process or the operation of the Sweepstakes generally, or who acts in violation of these Official Rules. Sponsor’s failure to enforce any term of these Official Rules shall not constitute a waiver of that term.</p>
                <p class="pl-4" style="font-style: italic">ANY ATTEMPT TO DELIBERATELY UNDERMINE THE LEGITIMATE OPERATION OF THE SWEEPSTAKES MAY BE A VIOLATION OF CRIMINAL AND/OR CIVIL LAWS AND SHOULD SUCH AN ATTEMPT BE MADE, THE SPONSOR RESERVES THE RIGHT TO DISQUALIFY AND SEEK DAMAGES OR OTHER REMEDIES FROM ANY PERSON RESPONSIBLE FOR SUCH ATTEMPT TO THE FULLEST EXTENT PERMITTED BY LAW.</p>
                <p class="pl-4" style="font-style: italic">In the event of a dispute regarding the identity of an individual who submitted an entry, the entry will be deemed submitted by the authorized account holder of the email address used to enter, provided s/he meets the eligibility requirements for the Sweepstakes.</p>
                <p><strong>12. DISPUTES/VENUE/GOVERNING LAW</strong>: By entering, Participants agree that: (a) any and all disputes, claims and causes of action arising out of, or connected with, this Sweepstakes or the Prize shall be resolved individually, without resort to any form of class action, and exclusively by the appropriate federal, state or local court located in Cook County, Illinois; (b) any and all claims, judgments and awards shall be limited to actual out-of-pocket costs incurred, including but not limited to costs associated with entering this Sweepstakes, but in no event attorneys’ fees; and (c) to the extent allowed by applicable law, under no circumstances will Participant be permitted to obtain awards for, and Participant hereby waives all rights to claim, punitive, incidental and/or consequential damages and/or any other damages, other than out-of-pocket expenses, and any and all rights to have damages multiplied or otherwise increased. SOME JURISDICTIONS DO NOT ALLOW THE LIMITATIONS OR EXCLUSION OF LIABILITY FOR INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO PORTIONS OF THE ABOVE MAY NOT APPLY TO YOU.</p>
                <p class="pl-4" style="font-style: italic">All issues and questions concerning the construction, validity, interpretation and enforceability of these Official Rules, Participants’ rights and obligations, or the rights and obligations of the Sponsor in connection with the Sweepstakes, shall be governed by, and construed in accordance with, the laws of the State of Illinois, without giving effect to any choice of law or conflict of law rules (whether of Illinois or any other jurisdiction), that would cause the application of the laws of any jurisdiction other than Illinois. In the event there is a discrepancy or inconsistency between disclosures or other statements contained in any Sweepstakes-related materials or notifications, or made by Sponsor or its representatives, and the terms and conditions of these Official Rules, these Official Rules shall prevail, govern and control.</p>
                <p><strong>13. SEVERABILITY</strong>: The invalidity or unenforceability of any provision of these Official Rules shall not affect the validity or enforceability of any other provision. In the event that any provision is determined to be invalid or otherwise unenforceable or illegal, these Official Rules shall otherwise remain in effect and shall be construed in accordance with their terms as if the invalid or illegal provision were not contained herein.</p>
                <p><strong>14. Holiday 2020 Surprise Cameo Live Sweepstakes Winners List</strong>: To receive the names of the winners, please contact <a href="mailto:hello@gmail.com">hello@cameo.com</a> no later than January 15, 2020.</p>
                <p class="mb-0">Sponsor: Baron App, Inc. d/b/a CAMEO,</p>
                <p class="mb-0">C/o Steven Galanis, CEO</p>
                <p class="mb-0">440 N Wabash Ave</p>
                <p class="mb-0">Unit 5008</p>
                <p>Chicago, IL 60611</p>
                <p>The winners’ names will be available after winners are verified.</p>
                <p>Any questions, comments or complaints regarding this Sweepstakes must be directed to the Sponsor only, and NOT to Zoom or Google.</p>
                <p>All trademarks used herein are the property of their respective owners.</p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection
