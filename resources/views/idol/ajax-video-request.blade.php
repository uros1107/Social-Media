<div class="table-responsive">
    <table class="table zero-configuration w-100">
        <thead class="d-none">
            <tr>
                <th>Status</th>
                <th class="desktop">Description</th>
                <th>From User</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            @php
                $fans = DB::table('users')->where('id', $order->order_fans_id)->first();
            @endphp
            <tr>
                <td>
                    <div class="d-flex new-request">
                        @if($fans->photo)
                        <img class="img-circle mr-2" src="{{ asset('assets/images/img/'.$fans->photo) }}" style="width: 40px;height: 40px;object-fit:cover">
                        @else
                        <img class="img-circle mr-2" src="{{ asset('assets/images/no-image.jpg') }}" style="width: 40px;height: 40px;object-fit:cover">
                        @endif
                        <div class="msg my-auto">
                            <h4 class="text-white mb-0" style="font-size: 16px">New Request!</h4>
                            <p class="text-white mb-0" style="font-size: 13px">from <span class="text-main-color">{{ $fans->user_name }}</span></p>
                        </div>
                    </div>
                </td>
                <td class="desktop">
                    <p class="mb-0 description">{{ $order->order_introduction }}</p>
                </td>
                <td class="user">
                    <div class="lang">
                        <div class="d-flex mb-1">
                            <img class="mr-2" src="{{ asset('assets/images/icons/chat.png') }}" style="width: 15px;height: 15px">
                            @if($order->order_lang == 1)
                            <p class="mb-0" style="color:#898989">English</p>
                            @elseif($order->order_lang == 2)
                            <p class="mb-0" style="color:#898989">Korean</p>
                            @else
                            <p class="mb-0" style="color:#898989">Both(English and Korean)</p>
                            @endif
                        </div>
                        <div class="d-flex">
                            @php
                                $occasion = DB::table('occasions')->where('occasion_id', $order->order_occasion)->first();
                            @endphp
                            <img class="mr-2" src="{{ asset('assets/images/icons/fire.png') }}" style="width: 15px;height: 15px">
                            <p class="mb-0" style="color:#898989">{{ $occasion->occasion_name }}</p>
                        </div>
                    </div>
                </td>
                <td class="text-right">
                    <button type="button" class="btn custom-btn view-request view-btn" data-id="{{ $order->order_id }}">View Request</button>
                </td> 
            </tr>
            @endforeach
        </tbody>
        <tfoot class="d-none">
            <tr>
                <th>Status</th>
                <th class="desktop">Description</th>
                <th>From User</th>
                <th>Date</th>
            </tr>
        </tfoot>
    </table>
</div>