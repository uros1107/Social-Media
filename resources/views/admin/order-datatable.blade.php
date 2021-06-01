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

td.details-control {
    background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_close.png') no-repeat center center;
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
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
    '</table>';
}

$(document).ready(function() {
    var table = $('#example').DataTable({
        'ajax': {!! $tabledata !!},
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
            { 'data': 'fans' },
            { 'data': 'idols' },
            { 'data': 'status' },
            { 'data': 'total' },
        ],
        'order': [[1, 'asc']]
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
});
</script>
@endsection