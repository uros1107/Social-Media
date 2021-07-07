@extends('layouts.fans')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<style>
@media (max-width: 574px) {
    .container-fluid {
        padding: 10px!important;
    }
    .footer .container-fluid {
        padding: 0px!important;
    }
}
</style>
@endsection

@section('content')
<div class="row featured mb-4">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">My Activity</h2>
            <p class="text-grey">Your order history will be on here</p>
        </div>
        <div class="order-history">
            <div class="w-100">
                <p class="mb-0 pl-2 text-white" style="background:#2b2b2b">Today</p>
            </div>
            @if(count($orders))
            @foreach($orders as $order)
            @php
                $idol_info = DB::table('idol_info')->where('idol_user_id', $order->order_idol_id)->first();
            @endphp
            <div class="history-row w-100 d-flex" data-id="{{ $order->order_id }}">
                <div class="title">
                    <h4 class="text-white">Video Request</h4>
                    <p class="mb-0">{{ $idol_info->idol_full_name }}</p>
                </div>
                <div class="date">
                    <p class="mb-0">{{ Carbon\Carbon::parse($order->updateed_at)->format('d F Y h m') }}</p>
                </div>
            </div>
            @endforeach
            @else 
            <div class="w-100 d-flex text-center">
                <p class="text-white mb-0 p-5 w-100">No orders yet</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.history-row').on('click', function() {
            location.href = "{{ route('view-video') }}" + '?order_id=' + $(this).data('id');
        })
    })
</script>
@endsection