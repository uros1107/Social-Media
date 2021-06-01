@extends('layouts.admin')

@section('title', 'Welcome to MillionK')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatable/datatables.min.css') }}">

<style>
option:before {
    content: '';
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -80px;
    width: 0;
    height: 0;
    border-top: solid 25px #000;
    border-left: solid 0px #fcfcfc;
    border-right: solid 25px #fcfcfc;
}
.custom-select1 {
    color: #2b2b2b!important;
    padding: 8px 5px!important;
}
.order-id {
    color: #2178F9;
}
@media (max-width: 574px) {
    .container-fluid {
        padding: 20px 10px!important;
    }
}
</style>
@endsection

@section('content')
<div class="top-header">
    <h4 class="text-white my-auto">Orders</h4>
    <div class="custom-breadcrumb my-auto">
        <h4 class="text-white mb-0"><span style="font-weight: normal!important">Dashboard</span> > Orders</h4>
    </div>
</div>
<div class="row m-0">
    <div class="col-12 col-sm-12 col-md-12 custom-card">
        <div class="tab">
            <h4 class="mb-0">List Orders</h4>
        </div>
        <div class="chart">
            <div class="d-flex custom-btn-group mb-4">
                <button class="btn custom-btn">Recent</button>
                <button class="btn custom-btn deactive">Pending</button>
                <button class="btn custom-btn deactive">Completed</button>
                <button class="btn custom-btn deactive">Refunded(Expired)</button>
                <button class="btn custom-btn deactive">Refuned(Declined)</button>
                <button class="btn custom-btn deactive">Paid Out</button>
            </div>
            <div class="datatable">
                <div class="table-responsive">
                    <table class="table zero-configuration">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Order Date</th>
                                <th>Due Date</th>
                                <th>Order ID</th>
                                <th>Fans</th>
                                <th>Idols</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=1;$i<=10;$i++)
                            <tr>
                                <td>
                                    <div class="m-auto">
                                        <img src="{{ asset('assets/images/icons/plus.png') }}">
                                    </div>
                                </td>
                                <td>
                                    22 Apr 2021
                                </td>
                                <td class="user">
                                    6 Days left
                                </td>
                                <td>
                                    <a href="#"><p class="mb-0 order-id">#2175</p></a>
                                </td>
                                <td>
                                    <p class="mb-0 description">John Doe</p>
                                </td> 
                                <td>
                                    <p class="mb-0 description">John Doe</p>
                                </td>
                                <td>
                                    <select class="custom-select1">
                                        <option>
                                            <div class="d-flex">
                                                <div class="recent-rectangle my-auto mr-2"></div>
                                                <span>Recent</span>
                                            </div>
                                        </option>
                                        <option>
                                            <div class="d-flex">
                                                <div class="pending-rectangle my-auto mr-2"></div>
                                                <span>Pending</span>
                                            </div>
                                        </option>
                                        <option>
                                            <div class="d-flex">
                                                <div class="completed-rectangle my-auto mr-2"></div>
                                                <span>Completed</span>
                                            </div>
                                        </option>
                                        <option>
                                            <div class="d-flex">
                                                <div class="expired-rectangle my-auto mr-2"></div>
                                                <span>Refuned (Expired)</span>
                                            </div>
                                        </option>
                                        <option>
                                            <div class="d-flex">
                                                <div class="declined-rectangle my-auto mr-2"></div>
                                                <span>Refunded (Declined)</span>
                                            </div>
                                        </option>
                                        <option>
                                            <div class="d-flex">
                                                <div class="paidout-rectangle my-auto mr-2"></div>
                                                <span>Paid Out</span>
                                            </div>
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    $78
                                </td>
                            </tr>
                            <!-- <tr class="expand">
                                <td colspan="8">
                                    <div class="row m-0">
                                        <div class="col-3 col-sm-3 col-md-3 fans">
                                            <h4 class="mb-0">Fans</h4>
                                            <div class="divider"></div>
                                            <div class="d-flex fans-content mb-2">
                                                <div class="left">
                                                    <p class="mb-0">Username</p>
                                                    <p class="mb-0 text-main-color">@johndoe</p>
                                                </div>
                                                <div class="right">
                                                    <p class="mb-0">IP Address</p>
                                                    <p class="mb-0 text-main-color">202.25.211</p>
                                                </div>
                                            </div>
                                            <div class="d-flex fans-content">
                                                <div class="left">
                                                    <p class="mb-0">Email</p>
                                                    <p class="mb-0 text-main-color">johndoe@mail.com</p>
                                                </div>
                                                <div class="right">
                                                    <p class="mb-0">Country</p>
                                                    <p class="mb-0 text-main-color">Singapore</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-sm-3 col-md-3 fans">
                                            <h4 class="mb-0">Idols</h4>
                                            <div class="divider"></div>
                                            <div class="d-flex fans-content mb-2">
                                                <div class="left">
                                                    <p class="mb-0">Username</p>
                                                    <p class="mb-0 text-main-color">@johndoe</p>
                                                </div>
                                                <div class="right">
                                                    <p class="mb-0">Fans</p>
                                                    <p class="mb-0 text-main-color">9.2K Likes</p>
                                                </div>
                                            </div>
                                            <div class="d-flex fans-content">
                                                <div class="left">
                                                    <p class="mb-0">Email</p>
                                                    <p class="mb-0 text-main-color">johndoe@mail.com</p>
                                                </div>
                                                <div class="right">
                                                    <p class="mb-0">Country</p>
                                                    <p class="mb-0 text-main-color">Singapore</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 order-detail">
                                            <h4 class="mb-0">Order Details</h4>
                                            <div class="divider"></div>
                                            <div class="d-flex mb-2">
                                                <div class="my-auto d-flex mr-3">
                                                    <img class="my-auto mr-1" src="{{ asset('assets/images/icons/chat.png') }}">
                                                    <p class="mb-0">English</p>
                                                </div>
                                                <div class="my-auto d-flex">
                                                    <img class="my-auto mr-1" src="{{ asset('assets/images/icons/fire.png') }}">
                                                    <p class="mb-0">Encouragement</p>
                                                </div>
                                            </div>
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard... <span class="text-main-color">View More</span></p>
                                        </div>
                                        <div class="col-3 col-sm-2 col-md-2 fans">
                                            <h4 class="mb-0">Base Fare</h4>
                                            <div class="divider"></div>
                                            <div class="d-flex fans-content mb-2">
                                                <div class="left">
                                                    <p class="mb-0">Request Price</p>
                                                    <p class="mb-0 text-main-color">$190</p>
                                                </div>
                                            </div>
                                            <div class="d-flex fans-content">
                                                <div class="left">
                                                    <p class="mb-0">Profit</p>
                                                    <p class="mb-0 text-main-color">$9,5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr> -->
                            @endfor
                        </tbody>
                        <tfoot class="d-none">
                            <tr>
                                <th></th>
                                <th>Order Date</th>
                                <th>Due Date</th>
                                <th>Order ID</th>
                                <th>Fans</th>
                                <th>Idols</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-none chart">
            <div class="desktop">
                <div class="main-title-part d-flex">
                    <div class="encourage">
                        <h4>Encourage her</h4>
                        <p class="mb-0">27 March 2021</p>
                    </div>
                    <div class="d-flex item-group">
                        <div class="eanring-item mr-5">
                            <h5>Paid</h5>
                            <p class="mb-0 text-main-color">$200</p>
                        </div>
                        <div class="eanring-item mr-5">
                            <h5>In Escrow</h5>
                            <p class="mb-0 text-main-color">$200</p>
                        </div>
                        <div class="eanring-item mr-5">
                            <h5>Net Earnings</h5>
                            <p class="mb-0 text-main-color">$160</p>
                        </div>
                        <div class="eanring-item">
                            <h5>Total Earnings</h5>
                            <p class="mb-0 text-main-color">$0</p>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="d-flex grey-part">
                    <div class="due-date my-auto mr-3">
                        <p class="mb-0">Due Date</p>
                    </div>
                    <div class="encourage-from">
                        <h4 class="mb-0">Encourage her</h4>
                        <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                    </div>
                    <div class="right d-flex">
                        <div class="status-detail mr-3">
                            <p class="mb-0">Status Detail</p>
                            <h4 class="text-main-color">No Video Submitted yet</h4>
                        </div>
                        <div class="refund">
                            <button class="btn custom-btn refund-btn">Refund</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile">
                <div class="main-title-part d-flex">
                    <div class="encourage">
                        <h4>Encourage her</h4>
                        <p class="mb-0">27 March 2021</p>
                    </div>
                    <div class="due-date">
                        <p class="mb-0">Due Date</p>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="item-group mb-3">
                    <div class="d-flex w-100">
                        <div class="earning-item text-center w-50">
                            <p class="mb-0">Paid</p>
                            <h4 class="text-main-color">$200</h4>
                        </div>
                        <div class="earning-item text-center w-50">
                            <p class="mb-0">In Escrow</p>
                            <h4 class="text-main-color">$200</h4>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="d-flex w-100">
                        <div class="earning-item text-center w-50">
                            <p class="mb-0">Net Earnings</p>
                            <h4 class="text-main-color">$160</h4>
                        </div>
                        <div class="earning-item text-center w-50">
                            <p class="mb-0">Total Earnings</p>
                            <h4 class="text-main-color">$0</h4>
                        </div>
                    </div>
                </div>
                <div class="text-center status-detail">
                    <p class="mb-0">Status Detail</p>
                    <h4 class='mb-0 text-main-color'>No Video Submitted yet</h4>
                </div>
                <div class="mt-3">
                    <button class="btn custom-btn refund-btn">Refund</button>
                </div>
            </div>
            <div class="divider"></div>
            <div class="row m-0 request-detail mb-3">
                <div class="col-12 col-md-8 col-sm-8">
                    <div class="sub-title">
                        <h4 class="mb-0">Personalized video request detail</h4>
                        <p class="mb-0">Let see what your fans wanted.</p>
                    </div>
                    <div class="divider"></div>
                    <div class="intruction">
                        <h4>Intruction</h4><br>
                        <p class="mb-0">Here is the instruction from fans about your video</p><br>
                        <p class="mb-0">Hi, Pak.</p><br>
                        <p class="mb-0">Please make video for Melissa, Encourage her for her exam next month.</p>
                        <p class="mb-0">Thank you so much.</p><br>
                        <p class="mb-0">Regards</p>
                        <p class="mb-0">John Doe</p>
                    </div>
                    <div class="divider"></div>
                    <div class="desktop">
                        <div class="occasion d-flex mt-4">
                            <div class="occasion-item ml-0">
                                <h4>Occasion</h4>
                                <p class="mb-0">Occasion Type</p>
                                <h4 class="text-main-color mb-0">Encouragement</h4>
                            </div>
                            <div class="occasion-item">
                                <h4>For who?</h4>
                                <p class="mb-0">Someone else</p>
                                <h4 class="text-main-color mb-0">Melissa</h4>
                            </div>
                            <div class="occasion-item">
                                <h4>Language</h4>
                                <p class="mb-0">Language request for this personalized video</p>
                                <h4 class="text-main-color mb-0">English</h4>
                            </div>
                        </div>
                    </div>
                    <div class="mobile">
                        <div class="occasion d-flex mt-4">
                            <div class="occasion-item ml-0">
                                <h4>Occasion</h4>
                                <p class="mb-0">Occasion Type</p>
                                <h4 class="text-main-color mb-0">Encouragement</h4>
                            </div>
                            <div class="occasion-item">
                                <h4>For who?</h4>
                                <p class="mb-0">Someone else</p>
                                <h4 class="text-main-color mb-0">Melissa</h4>
                            </div>
                        </div>
                        <div class="occasion-item mt-4">
                            <h4>Language</h4>
                            <p class="mb-0">Language request for this personalized video</p>
                            <h4 class="text-main-color mb-0">English</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-sm-4">
                    <div class="request-from">
                        <h4 class="title">Requested from</h4>
                        <div class="d-flex mb-3">
                            <img src="{{ asset('assets/images/profile.png') }}" class="img-circle mr-3">
                            <div class="username my-auto">
                                <p class="mb-0">@johndoe</p>
                                <h4 class="mb-0 text-main-color">John Doe</h4>
                            </div>
                        </div>
                        <div class="email mb-3">
                            <p class="mb-0">Email</p>
                            <h4 class="mb-0 text-main-color">johndoe@mail.com</h4>
                        </div>
                        <div class="ip-country d-flex">
                            <div class="ip-address">
                                <p class="mb-0">IP Address</p>
                                <h4 class="mb-0 text-main-color">202.25.211</h4>
                            </div>
                            <div class="ip-address">
                                <p class="mb-0">Country</p>
                                <h4 class="mb-0 text-main-color">Singapore</h4>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="idol-profile">
                        <h4 class="title">Idols</h4>
                        <div class="d-flex mb-3">
                            <img src="{{ asset('assets/images/profile.png') }}" class="img-circle mr-3">
                            <div class="username my-auto mr-3">
                                <p class="mb-0">@pakmiyong</p>
                                <h4 class="mb-0 text-main-color">Pak Mi-Yong</h4>
                            </div>
                            <div class="username my-auto">
                                <p class="mb-0">Rating</p>
                                <h4 class="mb-0 text-main-color">4.5 / 5</h4>
                            </div>
                        </div>
                        <div class="ip-country d-flex mb-3">
                            <div class="ip-address">
                                <p class="mb-0">Email</p>
                                <h4 class="mb-0 text-main-color">pakmiyong@mail.com</h4>
                            </div>
                            <div class="ip-address">
                                <p class="mb-0">Fans</p>
                                <h4 class="mb-0 text-main-color">9.2K Fans</h4>
                            </div>
                        </div>
                        <div class="email">
                            <p class="mb-0">Country</p>
                            <h4 class="mb-0 text-main-color">South Korea</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable.js') }}"></script>

<script></script>
@endsection