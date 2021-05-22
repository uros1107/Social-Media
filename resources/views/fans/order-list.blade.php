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
}
table.dataTable tbody td {
    padding: 20px 10px!important;
}
.dataTables_wrapper .dataTables_info {
    color: #fff!important;
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
                <table class="table zero-configuration">
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
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="active">Active</div>
                            </td>
                            <td class="user">
                                <h4 class="mb-0">Encourage her</h4>
                                <p class="mb-0">from <span class="text-main-color">John Doe</span></p>
                            </td>
                            <td class="desktop">
                                <p class="mb-0 description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </td>
                            <td>
                                <p class="date mb-0">Due<span class="text-main-color"> 4 April 2021</span></p>
                            </td> 
                            <td>
                                $250
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/icons/more.png') }}" class="more">
                            </td>
                        </tr>
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