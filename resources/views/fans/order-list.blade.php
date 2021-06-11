@extends('layouts.fans')

@section('title', 'Welcome to MillionK')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatable/datatables.min.css') }}">
<style>
.container-fluid {
    /* padding: 0px!important; */
}
div.dataTables_wrapper div.dataTables_filter,
div.dataTables_wrapper div.dataTables_length label {
    color: #fff!important;
}
table.dataTable tbody tr {
    background-color: #171717!important;
    height: 85px!important;
}
.table {
    color: #fff;
}
table.dataTable tbody td {
    padding: 20px 10px!important;
    border-top-color: #2b2b2b;
}
.dataTables_wrapper .dataTables_info {
    color: #fff!important;
}
.table-responsive {
    padding-top: 5px;
    padding-right: 5px;
}
div.dataTables_wrapper div.dataTables_filter input {
    border-radius: 8px;
    border-color: #2b2b2b;
}
@media (max-width: 574px) {
    .container-fluid {
        padding: 10px!important;
    }
    .footer .container-fluid {
        padding: 0px!important;
    }
    .order-list > .col-12 {
        padding: 0px;
    }
    #DataTables_Table_0_wrapper .row:first-child .col-md-6 {
        width: 50%;
        margin: auto;
    }
    div.dataTables_wrapper div.dataTables_filter input {
        width: 60%;
    }
    div.dataTables_wrapper div.dataTables_length label {
        margin-bottom: 0px!important;
        font-size: 12px;
    }
    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        justify-content: center;
    }
    .col-md-7, .col-md-5 {
        padding: 0px;
    }
}
</style>
@endsection

@section('content')
<div class="row follow-idol view-video payment-success m-0 mb-4">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part d-flex">
            <div>
                <h2 class="text-white">Order List</h2>
                <p class="text-grey">All orders will listed in here</p>
            </div>
        </div>
    </div>
</div>
<div class="row mb-5 order-list m-0">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="tab-btn-group d-flex mb-4">
            <button type="button" class="btn custom-btn mr-2">All</button>
            <button type="button" class="btn custom-btn mr-2 deactive">Active</button>
            <button type="button" class="btn custom-btn mr-2 deactive">Fulfilled</button>
            <button type="button" class="btn custom-btn mr-2 deactive">Expired</button>
            <button type="button" class="btn custom-btn deactive">Expired(24 hours)</button>
        </div>
        <div class="datatable">
            <div class="table-responsive">
                <table class="table zero-configuration w-100">
                    <thead class="d-none">
                        <tr>
                            <th>Status</th>
                            <th>From User</th>
                            <th class="desktop">Description</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        @php
                            $idol = DB::table('idol_info')->where('idol_user_id', $order->order_idol_id)->first();
                        @endphp
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">{{ $idol->idol_full_name }}</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">{{ $order->order_introduction }}</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> {{  Carbon\Carbon::parse($order->created_at)->format('d F Y') }}</span></p>
                            </td> 
                            <td>
                                ${{ $order->order_total_price }}
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="d-none">
                        <tr>
                            <th>Status</th>
                            <th>From User</th>
                            <th class="desktop">Description</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
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


<script>
$(document).ready(function() {
    $(document).on('click', '.occasion-item', function() {
        if($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    });
    $(document).on('click', '.first-block', function() {
        if($(this).hasClass('deactive')) {
            $(this).removeClass('deactive');
            $('.first-block').not(this).each(function(){
                $(this).addClass('deactive');
            });
        }
    });
});
</script>
@endsection