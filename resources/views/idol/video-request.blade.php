@extends('layouts.idol')

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
    border-collapse: separate!important;
    border-spacing: 0 1em!important;
}
table.dataTable tbody td {
    padding: 10px 20px!important;
    background: #2b2b2b;
    border-color: #2b2b2b!important;
}
.dataTables_wrapper .dataTables_info {
    color: #fff!important;
}
.view-request,
.view-request:hover {
    height: 40px;
    border-radius: 8px!important;
    font-size: 13px;
}
td:first-child {
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
}
td:last-child {
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
}
div.dataTables_wrapper div.dataTables_filter input {
    border-radius: 8px;
    border-color: #2b2b2b;
}
@media (max-width: 574px) { 
    .order-list .col-12 {
        padding: 0px;
    }
    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        justify-content: center;
    }
    table.dataTable tbody td {
        padding: 10px 5px!important;
    }
    .new-request > img {
        width: 30px;
        height: 30px;
    }
    .new-request .msg h4 {
        font-size: 14px!important;
    }
    .new-request .msg p {
        font-size: 12px!important;
    }
    .datatable .user p {
        font-size: 10px!important;
    }
    .view-request, .view-request:hover {
        height: 30px;
        font-size: 10px;
    }
    .col-md-7, .col-md-5 {
        padding: 0px;
    }
    #DataTables_Table_0_wrapper .row:first-child .col-md-6 {
        width: 50%;
        margin: auto;
    }
    div.dataTables_wrapper div.dataTables_length label {
        margin-bottom: 0px!important;
        font-size: 12px;
    }
    div.dataTables_wrapper div.dataTables_filter input {
        width: 60%;
    }
}
</style>
@endsection

@section('content')
<div class="row follow-idol view-video payment-success m-0 mb-4">
    <div class="col-12 col-sm-12 col-md-12 p-0">
        <div class="title-part d-flex">
            <div>
                <h2 class="text-white">Video Request</h2>
                <p class="text-grey">All your video request</p>
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
                <table class="table zero-configuration">
                    <thead class="d-none">
                        <tr>
                            <th>Status</th>
                            <th class="desktop">Description</th>
                            <th>From User</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex new-request">
                                    <img class="img-circle mr-2" src="{{ asset('assets/images/profile.png') }}" style="width: 40px;height: 40px">
                                    <div class="msg my-auto">
                                        <h4 class="text-white mb-0" style="font-size: 16px">New Request!</h4>
                                        <p class="text-white mb-0" style="font-size: 13px">from <span class="text-main-color">John Doe</span></p>
                                    </div>
                                </div>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td class="user">
                                <div class="lang">
                                    <div class="d-flex mb-1">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/chat.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">English</p>
                                    </div>
                                    <div class="d-flex">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/fire.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">Encouragement</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn custom-btn view-request">View Request</button>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex new-request">
                                    <img class="img-circle mr-2" src="{{ asset('assets/images/profile.png') }}" style="width: 40px;height: 40px">
                                    <div class="msg my-auto">
                                        <h4 class="text-white mb-0" style="font-size: 16px">New Request!</h4>
                                        <p class="text-white mb-0" style="font-size: 13px">from <span class="text-main-color">John Doe</span></p>
                                    </div>
                                </div>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td class="user">
                                <div class="lang">
                                    <div class="d-flex mb-1">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/chat.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">English</p>
                                    </div>
                                    <div class="d-flex">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/fire.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">Encouragement</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn custom-btn view-request">View Request</button>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex new-request">
                                    <img class="img-circle mr-2" src="{{ asset('assets/images/profile.png') }}" style="width: 40px;height: 40px">
                                    <div class="msg my-auto">
                                        <h4 class="text-white mb-0" style="font-size: 16px">New Request!</h4>
                                        <p class="text-white mb-0" style="font-size: 13px">from <span class="text-main-color">John Doe</span></p>
                                    </div>
                                </div>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td class="user">
                                <div class="lang">
                                    <div class="d-flex mb-1">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/chat.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">English</p>
                                    </div>
                                    <div class="d-flex">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/fire.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">Encouragement</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn custom-btn view-request">View Request</button>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex new-request">
                                    <img class="img-circle mr-2" src="{{ asset('assets/images/profile.png') }}" style="width: 40px;height: 40px">
                                    <div class="msg my-auto">
                                        <h4 class="text-white mb-0" style="font-size: 16px">New Request!</h4>
                                        <p class="text-white mb-0" style="font-size: 13px">from <span class="text-main-color">John Doe</span></p>
                                    </div>
                                </div>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td class="user">
                                <div class="lang">
                                    <div class="d-flex mb-1">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/chat.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">English</p>
                                    </div>
                                    <div class="d-flex">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/fire.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">Encouragement</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn custom-btn view-request">View Request</button>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex new-request">
                                    <img class="img-circle mr-2" src="{{ asset('assets/images/profile.png') }}" style="width: 40px;height: 40px">
                                    <div class="msg my-auto">
                                        <h4 class="text-white mb-0" style="font-size: 16px">New Request!</h4>
                                        <p class="text-white mb-0" style="font-size: 13px">from <span class="text-main-color">John Doe</span></p>
                                    </div>
                                </div>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td class="user">
                                <div class="lang">
                                    <div class="d-flex mb-1">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/chat.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">English</p>
                                    </div>
                                    <div class="d-flex">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/fire.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">Encouragement</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn custom-btn view-request">View Request</button>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex new-request">
                                    <img class="img-circle mr-2" src="{{ asset('assets/images/profile.png') }}" style="width: 40px;height: 40px">
                                    <div class="msg my-auto">
                                        <h4 class="text-white mb-0" style="font-size: 16px">New Request!</h4>
                                        <p class="text-white mb-0" style="font-size: 13px">from <span class="text-main-color">John Doe</span></p>
                                    </div>
                                </div>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td class="user">
                                <div class="lang">
                                    <div class="d-flex mb-1">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/chat.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">English</p>
                                    </div>
                                    <div class="d-flex">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/fire.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">Encouragement</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn custom-btn view-request">View Request</button>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex new-request">
                                    <img class="img-circle mr-2" src="{{ asset('assets/images/profile.png') }}" style="width: 40px;height: 40px">
                                    <div class="msg my-auto">
                                        <h4 class="text-white mb-0" style="font-size: 16px">New Request!</h4>
                                        <p class="text-white mb-0" style="font-size: 13px">from <span class="text-main-color">John Doe</span></p>
                                    </div>
                                </div>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td class="user">
                                <div class="lang">
                                    <div class="d-flex mb-1">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/chat.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">English</p>
                                    </div>
                                    <div class="d-flex">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/fire.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">Encouragement</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn custom-btn view-request">View Request</button>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex new-request">
                                    <img class="img-circle mr-2" src="{{ asset('assets/images/profile.png') }}" style="width: 40px;height: 40px">
                                    <div class="msg my-auto">
                                        <h4 class="text-white mb-0" style="font-size: 16px">New Request!</h4>
                                        <p class="text-white mb-0" style="font-size: 13px">from <span class="text-main-color">John Doe</span></p>
                                    </div>
                                </div>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td class="user">
                                <div class="lang">
                                    <div class="d-flex mb-1">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/chat.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">English</p>
                                    </div>
                                    <div class="d-flex">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/fire.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">Encouragement</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn custom-btn view-request">View Request</button>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex new-request">
                                    <img class="img-circle mr-2" src="{{ asset('assets/images/profile.png') }}" style="width: 40px;height: 40px">
                                    <div class="msg my-auto">
                                        <h4 class="text-white mb-0" style="font-size: 16px">New Request!</h4>
                                        <p class="text-white mb-0" style="font-size: 13px">from <span class="text-main-color">John Doe</span></p>
                                    </div>
                                </div>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td class="user">
                                <div class="lang">
                                    <div class="d-flex mb-1">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/chat.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">English</p>
                                    </div>
                                    <div class="d-flex">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/fire.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">Encouragement</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn custom-btn view-request">View Request</button>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex new-request">
                                    <img class="img-circle mr-2" src="{{ asset('assets/images/profile.png') }}" style="width: 40px;height: 40px">
                                    <div class="msg my-auto">
                                        <h4 class="text-white mb-0" style="font-size: 16px">New Request!</h4>
                                        <p class="text-white mb-0" style="font-size: 13px">from <span class="text-main-color">John Doe</span></p>
                                    </div>
                                </div>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td class="user">
                                <div class="lang">
                                    <div class="d-flex mb-1">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/chat.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">English</p>
                                    </div>
                                    <div class="d-flex">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/fire.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">Encouragement</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn custom-btn view-request">View Request</button>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex new-request">
                                    <img class="img-circle mr-2" src="{{ asset('assets/images/profile.png') }}" style="width: 40px;height: 40px">
                                    <div class="msg my-auto">
                                        <h4 class="text-white mb-0" style="font-size: 16px">New Request!</h4>
                                        <p class="text-white mb-0" style="font-size: 13px">from <span class="text-main-color">John Doe</span></p>
                                    </div>
                                </div>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td class="user">
                                <div class="lang">
                                    <div class="d-flex mb-1">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/chat.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">English</p>
                                    </div>
                                    <div class="d-flex">
                                        <img class="mr-2" src="{{ asset('assets/images/icons/fire.png') }}" style="width: 15px;height: 15px">
                                        <p class="mb-0" style="color:#898989">Encouragement</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn custom-btn view-request">View Request</button>
                            </td> 
                        </tr>

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
    $(document).on('click', '.view-request', function() {
        location.href = "{{ route('idol-v-request-detail') }}";
    })
});
</script>
@endsection