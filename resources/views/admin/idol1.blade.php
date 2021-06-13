@extends('layouts.admin')

@section('title', 'Welcome to MillionK')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
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
    background: #e5e5e5;
}
.order-id {
    color: #2178F9;
}
.custom-card {
    background: unset!important;
    border-radius: 20px!important;
}
.registered-date {
    border-radius: 14px;
    padding-left: 12px;
    background: #e5e5e5;
    border: 1px solid #767676;
    height: 40px;
    padding-right: 35px;
    width: 165px;
}
.date-part {
    position: relative;
}
.date-part > img {
    position: absolute;
    right: 20px;
    top: 12px;
    width: 16px;
}
.datatable th {
    vertical-align: middle!important;
    text-align: center!important;
}
.order-id-group .col-md-3 {
    border-right: 0px solid #e5e5e5!important;
}
.view-all {
    color: #2178F9!important;
}
.expand .fans:last-child {
    border-right: 0px solid #e5e5e5!important;
}
.table-responsive {
    padding-top: 5px;
    padding-right: 5px;
}
@media (max-width: 574px) { 
    .expand-content {
        flex-wrap: inherit !important;
        overflow: auto;
    }
    .container-fluid {
        padding: 20px 10px!important;
    }
    .custom-select-group > button, .custom-select-group > button:hover, .custom-select-group > button:focus {
        padding: 0px 30px!important;
    }
}

</style>
@endsection

@section('content')
<div class="top-header">
    <h4 class="text-white my-auto">Idol List</h4>
    <div class="custom-breadcrumb my-auto">
        <h4 class="text-white mb-0"><span style="font-weight: normal!important">Dashboard</span> > Idol List</h4>
    </div>
</div>
<div class="row m-auto">
    <div class="col-12 col-sm-12 col-md-12 d-flex mt-2 mb-3" style="position:relative">
        <div class="add-new-idol">
            <button class="btn custom-btn add-idol"><img src="{{ asset('assets/images/icons/add-user.png') }}">Add New Idols</button>
        </div>
        <div class="d-flex custom-select-group">
            <select class="custom-select1 mr-2 desktop">
                <option>Idol Username</option>
            </select>
            <select class="custom-select1 mr-2 desktop">
                <option>Idol Name</option>
            </select>
            <div class="date-part desktop">
                <input class="mr-2 registered-date" type="text" value="Registered Date" id="datepicker">
                <img src="{{ asset('assets/images/icons/calendar.png') }}">
            </div>
            <select class="custom-select1 mr-2 desktop">
                <option>Status</option>
            </select>
            <button class="btn custom-btn">Filter</button>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 custom-card">
        <div class="chart">
            <div class="datatable">
                <div class="table-responsive">
                    <table class="table zero-configuration">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Idol Username</th>
                                <th>Idol Name</th>
                                <th>Email</th>
                                <th>Join Date</th>
                                <th>Fans</th>
                                <th>Total Order</th>
                                <th>Pending Order</th>
                                <th>Perc(%)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=1; $i<=10; $i++)
                            <tr>
                                <td>
                                    <div class="m-auto">
                                        <img src="{{ asset('assets/images/icons/plus.png') }}">
                                    </div>
                                </td>
                                <td>
                                    <p class="text-main-color mb-0">@pakmiyong</p>
                                </td>
                                <td class="user">
                                    John Doe
                                </td>
                                <td>
                                    johndoe@gmail.com
                                </td>
                                <td>
                                    2 Sep 2021, 20:20
                                </td> 
                                <td>
                                    39k
                                </td>
                                <td>
                                    743
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    90%
                                </td>
                                <td>
                                    Active
                                </td>
                            </tr>
                            <!-- <tr class="expand">
                                <td colspan="10">
                                    <div class="row m-0 expand-content">
                                        <div class="col-4 col-sm-4 col-md-4 fans">
                                            <h4 class="mb-0">Pending Orders</h4>
                                            <div class="divider"></div>
                                            <div class="fans-content mb-2">
                                                <div class="row m-0 w-100 mb-2 order-id-group">
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                </div>
                                                <div class="row m-0 w-100 mb-2 order-id-group">
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                </div>
                                                <div class="row m-0 w-100 mb-2 order-id-group">
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <p class="mb-0 view-all">View All...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 fans">
                                            <h4 class="mb-0">Completed Orders</h4>
                                            <div class="divider"></div>
                                            <div class="fans-content mb-2">
                                                <div class="row m-0 w-100 mb-2 order-id-group">
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                </div>
                                                <div class="row m-0 w-100 mb-2 order-id-group">
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                </div>
                                                <div class="row m-0 w-100 mb-2 order-id-group">
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 view-all">View All...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 fans">
                                            <h4 class="mb-0">Refuned Orders</h4>
                                            <div class="divider"></div>
                                            <div class="fans-content mb-2">
                                                <div class="row m-0 w-100 mb-2 order-id-group">
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                </div>
                                                <div class="row m-0 w-100 mb-2 order-id-group">
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                </div>
                                                <div class="row m-0 w-100 mb-2 order-id-group">
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 text-main-color">#1122</p>
                                                    </div>
                                                    <div class="col-3 col-md-3 col-sm-3">
                                                        <p class="mb-0 view-all">View All...</p>
                                                    </div>
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
                                <th>Idol Username</th>
                                <th>Idol Name</th>
                                <th>Email</th>
                                <th>Join Date</th>
                                <th>Fans</th>
                                <th>Total Order</th>
                                <th>Pending Order</th>
                                <th>Perc(%)</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
        $('.add-idol').click(function() {
            location.href = "{{ route('admin-add-idol') }}"
        })
    })
</script>
@endsection