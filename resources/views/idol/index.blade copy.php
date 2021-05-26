@extends('layouts.idol')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
.custom-col {
    padding-left: 10px;
    padding-right: 10px;
}
</style>
@endsection

@section('content')
<div class="row idol discover-favourite mb-4">
    <div class="col-12 col-sm-12 col-md-12 d-flex user-profile">
        <div class="profile-info">
            <h4 class="text-white">You are not set up yet</h4>
            <h5 class="text-white" style="font-weight: unset">Complete your profile first so you can go<br>LIVE and start reaching out to your fans.</h5>
            <button class="btn custom-btn get-started">Get Started</button>
        </div>
        <div class="profile-action">
            <div class="grey-btn">
                <p class="text-white">Status: <span class="font-weight-bold">Pending</span></p>
            </div>
            <div class="circle-percent">
                <p class="mb-0 text-white">0%</p>
                <p class="mb-0 text-white">Done</p>
            </div>
        </div>
    </div>
</div>
<div class="row idol">
    <div class="col-12 col-sm-12 col-md-12 p-0">
        <div class="row m-0">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="grey-part w-100 mb-3">
                    <p class="mb-0 text-white">Hi, John Doe,</p>
                    <h4 class="mb-0 text-white">What's new on your dashboard Idol?</h4>
                </div>
                <div class="total-card">
                    <div class="w-40">
                        <div class="total-item d-flex mb-3">
                            <div class="my-auto">
                                <h3 class="text-main-color mb-0">0</h3>
                            </div>
                            <div class="my-auto">
                                <p class="text-main-color mb-0 font-weight-bold">Total</p>
                                <p class="text-main-color mb-0">Request</p>
                            </div>
                        </div>
                        <div class="total-item d-flex mb-3">
                            <div class="my-auto">
                                <h3 class="text-main-color mb-0">0</h3>
                            </div>
                            <div class="my-auto">
                                <p class="text-main-color mb-0 font-weight-bold">Pending</p>
                                <p class="text-main-color mb-0">Request</p>
                            </div>
                        </div>
                        <div class="total-item d-flex mb-3">
                            <div class="my-auto">
                                <h3 class="text-main-color mb-0">0</h3>
                            </div>
                            <div class="my-auto">
                                <p class="text-main-color mb-0 font-weight-bold">Completed</p>
                                <p class="text-main-color mb-0">Request</p>
                            </div>
                        </div>
                        <div class="total-item d-flex mb-3">
                            <div class="my-auto">
                                <h3 class="text-main-color mb-0">0</h3>
                            </div>
                            <div class="my-auto">
                                <p class="text-main-color mb-0 font-weight-bold">PaidOut</p>
                                <p class="text-main-color mb-0">Request</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-60">
                        <div class="col-12 col-sm-12 col-md-12 featured-video pr-0">
                            <div class="my-booking pb-0">
                                <div class="row m-0 mb-3">
                                    <div class="col-12 title">
                                        <div class="d-flex">
                                            <h4 class="text-white">My Bookings</h4>
                                        </div>
                                        <p class="mb-2">Net Earnings and Potential Earnings</p>
                                    </div>
                                    <div class="col-12 how-content">
                                        <div class="divider mb-3"></div>
                                        <div class="d-flex mb-2">
                                            <div class="col-sm-6 text-center m-auto p-0" style="border-right: 1px solid #2b2b2b;">
                                                <h5 class="text-white">Total Booking</h5>
                                                <h5 class="text-main-color">$0</h5>
                                            </div>
                                            <div class="col-sm-6 text-center m-auto p-0">
                                                <h5 class="text-white">Pending Booking</h5>
                                                <h5 class="text-main-color">$0</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 how-content">
                                        <div class="divider mb-3"></div>
                                        <div class="d-flex mb-2">
                                            <div class="col-sm-6 text-center m-auto p-0" style="border-right: 1px solid #2b2b2b;">
                                                <h5 class="text-white">Net Earnings</h5>
                                                <h5 class="text-main-color">$0</h5>
                                            </div>
                                            <div class="col-sm-6 text-center m-auto p-0">
                                                <h5 class="text-white">Paid Out</h5>
                                                <h5 class="text-main-color">$0</h5>
                                            </div>
                                        </div>
                                        <div class="divider mb-3"></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="chart d-flex">
                                            <span class="mr-2 text-white">500</span>
                                            <div class="my-auto" style="height: 1px;background: #898989;width: 100%"></div>
                                        </div>
                                        <div class="chart d-flex">
                                            <span class="mr-2 text-white">400</span>
                                            <div class="my-auto" style="height: 1px;background: #898989;width: 100%"></div>
                                        </div>
                                        <div class="chart d-flex">
                                            <span class="mr-2 text-white">300</span>
                                            <div class="my-auto" style="height: 1px;background: #898989;width: 100%"></div>
                                        </div>
                                        <div class="chart d-flex">
                                            <span class="mr-2 text-white">200</span>
                                            <div class="my-auto" style="height: 1px;background: #898989;width: 100%"></div>
                                        </div>
                                        <div class="chart d-flex">
                                            <span class="mr-2 text-white">100</span>
                                            <div class="my-auto" style="height: 1px;background: #898989;width: 100%"></div>
                                        </div>
                                        <div class="chart d-flex">
                                            <span class="mr-4 text-white">0</span>
                                            <div class="my-auto" style="height: 1px;background: #898989;width: 100%"></div>
                                        </div>
                                        <div class="chart-x d-flex" style="margin-left: 30px">
                                            <span class="text-white m-auto">Jan</span>
                                            <span class="text-white m-auto">Feb</span>
                                            <span class="text-white m-auto">Mar</span>
                                            <span class="text-white m-auto">Apr</span>
                                            <span class="text-white m-auto">Mei</span>
                                            <span class="text-white m-auto">Jun</span>
                                            <span class="text-white m-auto">Jul</span>
                                            <span class="text-white m-auto">Ags</span>
                                            <span class="text-white m-auto">Sep</span>
                                            <span class="text-white m-auto">Okt</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="standard-delivery">
                                    <span class="text-white">Go To Eearnings</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 featured-video pr-0">
                <div class="my-booking pb-0">
                    <div class="row m-0 mb-3">
                        <div class="col-12 title">
                            <div class="d-flex">
                                <h4 class="text-white">Request Video Notification</h4>
                            </div>
                            <p class="mb-2">Quick action notification</p>
                        </div>
                        <div class="col-12">
                            <div class="divider mb-3"></div>
                            <div class="d-flex mb-2">
                                <a class="text-main-color mr-3" style="color:#898989">New Request</a>
                                <a class="mr-3" style="color:#898989">Pending</a>
                                <a class="mr-3" style="color:#898989">Refunded</a>
                                <a class="mr-3" style="color:#898989">Fulfilled</a>
                            </div>
                            <div class="w-100 text-center" style="height: 390px;padding-top:150px">
                                <p class="mb-0 text-white">You have no request yet</p>
                            </div>
                        </div>
                    </div>
                    <div class="standard-delivery">
                        <span class="text-white">See all request</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row featured mb-4">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">Featured Videos</h2>
            <p class="text-grey">All fulfilled videos request submitted</p>
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part">
            <div class="row m-0 mb-4">
                <div class="col-12 colsm-12 text-center">
                    <p class="mb-5 mt-5 text-white">You have no Featured Videos Yet</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.custom-col').on('click', function() {
            location.href = "{{ route('follow-idol') }}";
        })
    })
</script>
@endsection