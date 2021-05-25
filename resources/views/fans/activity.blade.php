@extends('layouts.fans')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>

</style>
@endsection

@section('content')
<div class="row featured mb-4">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">My Activity</h2>
            <p class="text-grey">My order history will be on here</p>
        </div>
        <div class="order-history">
            <div class="w-100">
                <p class="mb-0 pl-2 text-white" style="background:#2b2b2b">Today</p>
            </div>
            <div class="history-row w-100 d-flex">
                <div class="title">
                    <h4 class="text-white">Video Request</h4>
                    <p class="mb-0">John Doe</p>
                </div>
                <div class="date">
                    <p class="mb-0">28 March 2021 01.45</p>
                </div>
            </div>
            <div class="history-row w-100 d-flex">
                <div class="title">
                    <h4 class="text-white">Video Request</h4>
                    <p class="mb-0">John Doe</p>
                </div>
                <div class="date">
                    <p class="mb-0">28 March 2021 01.45</p>
                </div>
            </div>
            <div class="history-row w-100 d-flex">
                <div class="title">
                    <h4 class="text-white">Video Request</h4>
                    <p class="mb-0">John Doe</p>
                </div>
                <div class="date">
                    <p class="mb-0">28 March 2021 01.45</p>
                </div>
            </div>
            <div class="history-row w-100 d-flex">
                <div class="title">
                    <h4 class="text-white">Video Request</h4>
                    <p class="mb-0">John Doe</p>
                </div>
                <div class="date">
                    <p class="mb-0">28 March 2021 01.45</p>
                </div>
            </div>
            <div class="history-row w-100 d-flex">
                <div class="title">
                    <h4 class="text-white">Video Request</h4>
                    <p class="mb-0">John Doe</p>
                </div>
                <div class="date">
                    <p class="mb-0">28 March 2021 01.45</p>
                </div>
            </div>
            <div class="history-row w-100 d-flex">
                <div class="title">
                    <h4 class="text-white">Video Request</h4>
                    <p class="mb-0">John Doe</p>
                </div>
                <div class="date">
                    <p class="mb-0">28 March 2021 01.45</p>
                </div>
            </div>
            <div class="history-row w-100 d-flex">
                <div class="title">
                    <h4 class="text-white">Video Request</h4>
                    <p class="mb-0">John Doe</p>
                </div>
                <div class="date">
                    <p class="mb-0">28 March 2021 01.45</p>
                </div>
            </div>
            <div class="history-row w-100 d-flex">
                <div class="title">
                    <h4 class="text-white">Video Request</h4>
                    <p class="mb-0">John Doe</p>
                </div>
                <div class="date">
                    <p class="mb-0">28 March 2021 01.45</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.history-row').on('click', function() {
            location.href = "{{ route('view-video') }}";
        })
    })
</script>
@endsection