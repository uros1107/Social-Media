<h1>Your order was declined by {{ $idol_full_name }}!</h1>
<h3>Your payment was refunded again.</h3>
   
Order details:
<div>
    <h4>Who is this for? : </h4>
    <p>{{ $order->order_who_for == 1? 'For me' : 'Someone else' }}</p>
</div>
<div>
    <h4>To : </h4>
    <p>{{ $order->order_to }}</p>
</div>
<div>
    <h4>Language Preference : </h4>
    @if($order->order_lang == 1)
    <p>English</p>
    @elseif($order->order_lang == 2)
    <p>Korean</p>
    @else
    <p>Mix(English and Korean)</p>
    @endif
</div>
<div>
    @php
        $occasion = DB::table('occasions')->where('occasion_id', $order->order_occasion)->first();
    @endphp
    <h4>Occasion Type : </h4>
    <p>{{ $occasion->occasion_name }}</p>
</div>
<div>
    <h4>Instruction : </h4>
    <p>{{ $order->order_introduction }}</p>
</div>
<div>
    <h4>Order Price : </h4>
    <p>{{ $order->order_price }}</p>
</div>
<div>
    <h4>Order Fee : </h4>
    <p>{{ $order->order_fee }}</p>
</div>
<div>
    <h4>Total Price : </h4>
    <p>{{ $order->order_total_price }}</p>
</div>