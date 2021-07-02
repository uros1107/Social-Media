@extends('layouts.admin')

@section('title', 'Welcome to MILLIONK')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatable/datatables.min.css') }}">

<style>
.custom-select1 {
    color: #2b2b2b!important;
    padding: 8px 5px 8px 25px!important;
}
.order-id {
    color: #2178F9;
}

td.details-control {
    background: url('/assets/images/icons/plus.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('/assets/images/icons/minus.png') no-repeat center center;
}
tr td:nth-child(4) {
    color: #2178F9!important;
}
tr td:nth-child(7) {
    position: relative;
}
th {
    color: #FF335C;
}
.tab h4 {
    font-size: 16px;
}
.tab-deactive {
    background: #ff335c!important;
    color: white!important;
}
.chart { 
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}
.color-status {
    position: absolute;
    top: 20px;
    left: 20px;
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
<div class="row m-auto">
    <div class="col-12 col-sm-12 col-md-12 custom-card">
        <div class="d-flex">
            <div class="tab tab-header">
                <h4 class="mb-0">List Orders</h4>
            </div>
            <div class="tab d-none tab-order-header">
                <div class="d-flex" style="justify-content: center">
                    <h4 class="mb-0" id="tab-order-id"></h4>
                    <img class="ml-4 close" style="position:absolute;right: 14px" src="{{ asset('assets/images/icons/close-fill.png') }}">
                </div>
            </div>
        </div>
        <div class="chart">
            <div class="d-flex custom-btn-group mb-4">
                <button class="btn custom-btn order-status-btn" data-id="5">Recent</button>
                <button class="btn custom-btn order-status-btn deactive" data-id="0">Pending</button>
                <button class="btn custom-btn order-status-btn deactive" data-id="1">Completed</button>
                <button class="btn custom-btn order-status-btn deactive" data-id="4">Refunded(Expired)</button>
                <button class="btn custom-btn order-status-btn deactive" data-id="3">Refunded(Declined)</button>
                <button class="btn custom-btn order-status-btn deactive" data-id="2">Paid Out</button>
            </div>
            <div class="datatable">
                <table id="example" class="display" cellspacing="0" width="100%">
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
                    <tfoot>
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
        <div class="chart order-detail-block d-none">
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
    /* Formatting function for row details - modify as you need */
function format ( d ) {
    var lang;
    if(d.order.order_lang == 1) {
        lang = 'English';
    } else if(d.order.order_lang == 2) {
        lang = 'Korean';
    } else {
        lang = 'Mix (English and Korean)';
    }
    // `d` is the original data object for the row
    return '<table cellpadding="8" class="w-100" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr class="expand">' + 
            '<td colspan="8">' + 
                '<div class="row m-0">' +
                    '<div class="col-3 col-sm-3 col-md-3 fans">' + 
                        '<h4 class="mb-0">Fans</h4>' + 
                        '<div class="divider"></div>' + 
                        '<div class="d-flex fans-content mb-2">' + 
                            '<div class="left">' + 
                                '<p class="mb-0">Username</p>' + 
                                '<p class="mb-0 text-main-color">@' + d.fans.user_name + '</p>' + 
                            '</div>' + 
                            '<div class="right">' + 
                                '<p class="mb-0">IP Address</p>' + 
                                '<p class="mb-0 text-main-color">' + '202.25.211' + '</p>' + 
                            '</div>' + 
                        '</div>' + 
                        '<div class="d-flex fans-content">' + 
                            '<div class="left">' + 
                                '<p class="mb-0">Email</p>' + 
                                '<p class="mb-0 text-main-color">' + d.fans.email + '</p>' + 
                            '</div>' + 
                            '<div class="right">' + 
                                '<p class="mb-0">Country</p>' + 
                                '<p class="mb-0 text-main-color">' + 'Singapore' + '</p>' + 
                            '</div>' + 
                        '</div>' + 
                    '</div>' + 
                    '<div class="col-3 col-sm-3 col-md-3 fans">' + 
                        '<h4 class="mb-0">Idols</h4>' + 
                        '<div class="divider"></div>' + 
                        '<div class="d-flex fans-content mb-2">' + 
                            '<div class="left">' + 
                                '<p class="mb-0">Username</p>' + 
                                '<p class="mb-0 text-main-color">@' + d.idol.idol_user_name + '</p>' + 
                            '</div>' + 
                            '<div class="right">' + 
                                '<p class="mb-0">Fans</p>' + 
                                '<p class="mb-0 text-main-color">' + d.fans_count + ' Likes</p>' + 
                            '</div>' + 
                        '</div>' + 
                        '<div class="d-flex fans-content">' + 
                            '<div class="left">' + 
                                '<p class="mb-0">Email</p>' + 
                                '<p class="mb-0 text-main-color">' + d.idol.idol_email + '</p>' + 
                            '</div>' + 
                            '<div class="right">' + 
                                '<p class="mb-0">Country</p>' + 
                                '<p class="mb-0 text-main-color">' + 'Singapore' + '</p>' + 
                            '</div>' + 
                        '</div>' + 
                    '</div>' + 
                    '<div class="col-3 col-sm-4 col-md-4 order-detail">' + 
                        '<h4 class="mb-0">Order Details</h4>' + 
                        '<div class="divider"></div>' + 
                        '<div class="d-flex mb-2">' + 
                            '<div class="my-auto d-flex mr-3">' + 
                                '<img class="my-auto mr-1" src="' + "{{ asset('assets/images/icons/chat.png') }}" + '">' + 
                                '<p class="mb-0">' + lang + '</p>' + 
                            '</div>' + 
                            '<div class="my-auto d-flex">' + 
                                '<img class="my-auto mr-1" src="' + "{{ asset('assets/images/icons/fire.png') }}" + '">' + 
                                '<p class="mb-0">' + d.occasion + '</p>' + 
                            '</div>' + 
                        '</div>' + 
                        // '<p class="mb-0">' + d.order.order_introduction + '<span class="text-main-color">View More</span></p>' + 
                        '<p class="mb-0">' + d.order.order_introduction + '</p>' + 
                    '</div>' + 
                    '<div class="col-3 col-sm-2 col-md-2 fans">' + 
                        '<h4 class="mb-0">Base Fare</h4>' + 
                        '<div class="divider"></div>' + 
                        '<div class="d-flex fans-content mb-2">' + 
                            '<div class="left">' + 
                                '<p class="mb-0">Request Price</p>' + 
                                '<p class="mb-0 text-main-color">$' + d.order.order_price + '</p>' + 
                            '</div>' + 
                        '</div>' + 
                        '<div class="d-flex fans-content">' + 
                            '<div class="left">' + 
                                '<p class="mb-0">Profit</p>' + 
                                '<p class="mb-0 text-main-color">$' + d.order.order_fee + '</p>' + 
                            '</div>' + 
                        '</div>' + 
                    '</div>' + 
                '</div>' + 
            '</td>' + 
        '</tr>' + 
    '</table>';
}

$(document).ready(function() {
    var table = $('#example').DataTable({
        'ajax': "{{ route('admin-order-list') }}",
        'columns': [
            {
                'className':      'details-control',
                'orderable':      false,
                'data':           null,
                'defaultContent': ''
            },
            { 'data': 'order_date' },
            { 'data': 'due_date' },
            { 'data': 'order_id' },
            { 'data': 'fans_name' },
            { 'data': 'idols_name' },
            { 'data': 'status' },
            { 'data': 'total' },
        ],
        'order': [[1, 'desc']]
    } );

    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function(){
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if(row.child.isShown()){
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });

    $('.order-status-btn').on('click', function() {
        var order_status = $(this).data('id');

        if($(this).hasClass('deactive')) {
            $(this).removeClass('deactive');
            $('.order-status-btn').not(this).each(function(){
                $(this).addClass('deactive');
            });
        }
        table.destroy();
        table = $('#example').DataTable({
            'ajax': "{{ route('admin-order-status-list') }}" + '?order_status=' + order_status,
            'columns': [
                {
                    'className':      'details-control',
                    'orderable':      false,
                    'data':           null,
                    'defaultContent': ''
                },
                { 'data': 'order_date' },
                { 'data': 'due_date' },
                { 'data': 'order_id' },
                { 'data': 'fans_name' },
                { 'data': 'idols_name' },
                { 'data': 'status' },
                { 'data': 'total' },
            ],
            'order': [[1, 'desc']]
        } );
    })

    $(document).on('click', '.order-id', function() {
        var order_id = $(this).data('id');

        $('.tab-header').addClass('tab-deactive');
        $('.tab-order-header').removeClass('d-none');
        $('#tab-order-id').html('#' + order_id);

        $.ajax({
            url: "{{ route('admin-order-detail') }}",
            method: 'get',
            data: { order_id: order_id },
            success: function (res) {
                $('.chart').addClass('d-none');
                $('.order-detail-block').removeClass('d-none');
                $('.order-detail-block').html(res);
            }
        });
    })

    $(document).on('click', '.close', function() {
        $('.tab-order-header').addClass('d-none');
        $('.tab-header').removeClass('tab-deactive');
        $('.chart').removeClass('d-none');
        $('.order-detail-block').addClass('d-none');
    });

    $(document).on('change', '.custom-select1', function() {
        console.log($(this).val())
        var order_status = $(this).val();
        switch (order_status) {
            case '5':
                $(this).parent().children().first().css('background', '#2178F9');
                break;
            case '0':
                $(this).parent().children().first().css('background', '#FFC107');
                break;
            case '1':
                $(this).parent().children().first().css('background', '#4CAF50');
                break;
            case '4':
                $(this).parent().children().first().css('background', '#7636FF');
                break;
            case '3':
                $(this).parent().children().first().css('background', '#EB001B');
                break;
            case '2':
                $(this).parent().children().first().css('background', '#898989');
                break;
        
            default:
                break;
        }
    });
});
</script>
@endsection