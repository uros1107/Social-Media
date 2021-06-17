@php
    $fans = DB::table('users')->where('id', $order->order_fans_id)->first();
@endphp
<div class="desktop">
    <div class="main-title-part d-flex">
        <div class="encourage">
            <h4>Encourage her</h4>
            <p class="mb-0">{{ Carbon\Carbon::parse($order->created_at)->format('d F Y') }}</p>
        </div>
        <div class="d-flex item-group">
            <div class="eanring-item mr-5">
                <h5>Paid</h5>
                <p class="mb-0 text-main-color">${{ $order->order_status == 1? $order->order_price : '0' }}</p>
            </div>
            <div class="eanring-item mr-5">
                <h5>In Escrow</h5>
                <p class="mb-0 text-main-color">${{ $order->order_status == 0? $order->order_price : '0' }}</p>
            </div>
            <div class="eanring-item mr-5">
                <h5>Net Earnings</h5>
                <p class="mb-0 text-main-color">${{ $order->order_fee }}</p>
            </div>
            <div class="eanring-item">
                <h5>Total Earnings</h5>
                <p class="mb-0 text-main-color">${{ $order->order_total_price }}</p>
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
            <p class="mb-0">from <span class="text-main-color">{{ $fans->name }}</span></p>
        </div>
        @if($order->order_status == 0)
        <div class="right d-flex">
            <div class="status-detail mr-3">
                <p class="mb-0">Status Detail</p>
                <h4 class="text-main-color">No Video Submitted yet</h4>
            </div>
            <div class="refund">
                <button class="btn custom-btn refund-btn">Refund</button>
            </div>
        </div>
        @endif
    </div>
</div>
<div class="mobile">
    <div class="main-title-part d-flex">
        <div class="encourage">
            <h4>Encourage her</h4>
            <p class="mb-0">{{ Carbon\Carbon::parse($order->created_at)->format('d F Y') }}</p>
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
                <h4 class="text-main-color">${{ $order->order_status == 1? $order->order_price : '0' }}</h4>
            </div>
            <div class="earning-item text-center w-50">
                <p class="mb-0">In Escrow</p>
                <h4 class="text-main-color">${{ $order->order_status == 0? $order->order_price : '0' }}</h4>
            </div>
        </div>
        <div class="divider"></div>
        <div class="d-flex w-100">
            <div class="earning-item text-center w-50">
                <p class="mb-0">Net Earnings</p>
                <h4 class="text-main-color">${{ $order->order_fee }}</h4>
            </div>
            <div class="earning-item text-center w-50">
                <p class="mb-0">Total Earnings</p>
                <h4 class="text-main-color">${{ $order->order_total_price }}</h4>
            </div>
        </div>
    </div>
    @if($order->order_status == 0)
    <div class="text-center status-detail">
        <p class="mb-0">Status Detail</p>
        <h4 class='mb-0 text-main-color'>No Video Submitted yet</h4>
    </div>
    <div class="mt-3">
        <button class="btn custom-btn refund-btn">Refund</button>
    </div>
    @endif
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
            <p class="mb-0">{{ $order->order_introduction }}</p>
        </div>
        <div class="divider"></div>
        <div class="desktop">
            <div class="occasion d-flex mt-4">
                <div class="occasion-item ml-0">
                    <h4>Occasion</h4>
                    @php
                        $occasion = DB::table('occasions')->where('occasion_id', $order->order_occasion)->first();
                    @endphp
                    <p class="mb-0">Occasion Type</p>
                    <h4 class="text-main-color mb-0">{{ $occasion->occasion_name }}</h4>
                </div>
                <div class="occasion-item">
                    <h4>For who?</h4>
                    <p class="mb-0">{{ $order->order_who_for == 1? 'For me' : 'Someone else' }}</p>
                    <h4 class="text-main-color mb-0">{{ $order->order_to }}</h4>
                </div>
                <div class="occasion-item">
                    <h4>Language</h4>
                    <p class="mb-0">Language request for this personalized video</p>
                    @if($order->order_lang == 1)
                    <h4 class="text-main-color mb-0">English</h4>
                    @elseif($order->order_lang == 2)
                    <h4 class="text-main-color mb-0">Korean</h4>
                    @else
                    <h4 class="text-main-color mb-0">Mix(English and Korean)</h4>
                    @endif
                </div>
            </div>
        </div>
        <div class="mobile">
            <div class="occasion d-flex mt-4">
                <div class="occasion-item ml-0">
                    <h4>Occasion</h4>
                    <p class="mb-0">Occasion Type</p>
                    <h4 class="text-main-color mb-0">{{ $occasion->occasion_name }}</h4>
                </div>
                <div class="occasion-item">
                    <h4>For who?</h4>
                    <p class="mb-0">{{ $order->order_who_for == 1? 'For me' : 'Someone else' }}</p>
                    <h4 class="text-main-color mb-0">{{ $order->order_to }}</h4>
                </div>
            </div>
            <div class="occasion-item mt-4">
                <h4>Language</h4>
                <p class="mb-0">Language request for this personalized video</p>
                @if($order->order_lang == 1)
                <h4 class="text-main-color mb-0">English</h4>
                @elseif($order->order_lang == 2)
                <h4 class="text-main-color mb-0">Korean</h4>
                @else
                <h4 class="text-main-color mb-0">Mix(English and Korean)</h4>
                @endif
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 col-sm-4">
        <div class="request-from">
            <h4 class="title">Requested from</h4>
            <div class="d-flex mb-3">
                @if(!$fans->photo)
                <img src="{{ asset('assets/images/no-image.jpg') }}" class="img-circle mr-3">
                @else
                <img src="{{ asset('assets/images/img/'.$fans->photo) }}" class="img-circle mr-3">
                @endif
                <div class="username my-auto">
                    <p class="mb-0">{{ '@'.$fans->name }}</p>
                    <h4 class="mb-0 text-main-color">{{ $fans->name }}</h4>
                </div>
            </div>
            <div class="email mb-3">
                <p class="mb-0">Email</p>
                <h4 class="mb-0 text-main-color">{{ $fans->email }}</h4>
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
        @php
            $idol_info = DB::table('idol_info')->where('idol_user_id', $order->order_idol_id)->first();
        @endphp
        <div class="idol-profile">
            <h4 class="title">Idols</h4>
            <div class="d-flex mb-3">
                <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class="img-circle mr-3">
                <div class="username my-auto mr-3">
                    <p class="mb-0">{{ '@'.$idol_info->idol_user_name }}</p>
                    <h4 class="mb-0 text-main-color">{{ $idol_info->idol_full_name }}</h4>
                </div>
                <div class="username my-auto">
                    <p class="mb-0">Rating</p>
                    <h4 class="mb-0 text-main-color">4.5 / 5</h4>
                </div>
            </div>
            <div class="ip-country d-flex mb-3">
                <div class="ip-address">
                    <p class="mb-0">Email</p>
                    <h4 class="mb-0 text-main-color">{{ $idol_info->idol_email }}</h4>
                </div>
                @php
                    $fans_count = 0;
                    foreach (DB::table('users')->get() as $user) {
                        $array = json_decode($user->fandom_lists);
                        if($array) {
                            $has_idol = in_array($order->order_idol_id, $array);
                            if($has_idol) {
                                $fans_count++;
                            }
                        }
                    }
                @endphp
                <div class="ip-address">
                    <p class="mb-0">Fans</p>
                    <h4 class="mb-0 text-main-color">{{ $fans_count }} Fans</h4>
                </div>
            </div>
            <div class="email">
                <p class="mb-0">Country</p>
                <h4 class="mb-0 text-main-color">South Korea</h4>
            </div>
        </div>
    </div>
</div>
