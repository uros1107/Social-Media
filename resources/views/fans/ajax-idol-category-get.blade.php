@if(count($idols))
@foreach($idols as $idol)
@php
    $idol_info = DB::table('idol_info')->where('idol_user_id', $idol->id)->first();
@endphp
<div class="col-4 col-sm-3 col-md-3 custom-col" id="custom-col" data-url="{{ route('follow-idol', $idol_info->idol_user_name) }}">
    <div class="image-item">
        <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class="w-100">    
        <div class="gradient"></div>
        <div class="image-profile">
            <h5 class="text-white">{{ $idol_info->idol_full_name }}</h5>
            <div class="d-flex" style="flex-wrap: wrap">
                <p class="text-white mr-3 mb-0">{{ $idol_info->idol_head_bio }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<div class="col-12 col-sm-12 col-md-12 d-flex" style="height: 200px">
    <p class="text-white mb-0 text-center m-auto">No idols yet</p>
</div>
@endif