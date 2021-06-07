@extends('layouts.admin')

@section('title', 'Welcome to MillionK')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatable/datatables.min.css') }}">

<style>
.table-responsive {
    padding-top: 5px;
    padding-right: 5px;
}
</style>
@endsection

@section('content')
<div class="row m-auto">
    <div class="col-12 col-sm-12 col-md-12">
        <p class="mb-1">Hi Admin,</p>
        <h4 class="font-weight-bold">What's new on your <span class="text-main-color">Dashboard</span>?</h4>
    </div>
    <div class="mt-3 d-flex w-100" style="overflow: auto">
        <div class="col-6 col-sm-3 col-md-3">
            <div class="d-flex total-item">
                <h4 class="text-main-color m-auto">110</h4>
                <p class="m-auto">Total Idols</p>
            </div>
        </div>
        <div class="col-6 col-sm-3 col-md-3">
            <div class="d-flex total-item">
                <h4 class="text-main-color m-auto">550</h4>
                <p class="m-auto">Total Fans</p>
            </div>
        </div>
        <div class="col-6 col-sm-3 col-md-3">
            <div class="d-flex total-item">
                <h4 class="text-main-color m-auto">110</h4>
                <p class="m-auto">Total Orders</p>
            </div>
        </div>
        <div class="col-6 col-sm-3 col-md-3">
            <div class="d-flex total-item">
                <h4 class="text-main-color m-auto">110</h4>
                <p class="m-auto">Completed Orders</p>
            </div>
        </div>
    </div>
    <div class="mt-3 w-100 platform">
        <div class="col-12 col-sm-8 col-md-8">
            <div class="chart">
                <h4>Platform <span class="text-main-color">Statistic</span></h4>
                <div class="divider"></div>
                <div class="filter">
                    <div class="sort-by">
                        <h5>Sort by</h5>
                        <select class="custom-select1">
                            <option>Web visitors</option>
                        </select>
                    </div>
                    <div class="order-by">
                        <h5>Order by</h5>
                        <select class="custom-select1">
                            <option>Month</option>
                        </select>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="chart-container">
                    <canvas id="myChart" width="100%" height="50%"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 col-md-4">
            <div class="chart">
                <h4>Platform <span class="text-main-color">Numbers</span></h4>
                <div class="divider"></div>
                <div class="filter">
                    <div class="sort-by">
                        <h5>Sort by</h5>
                        <select class="custom-select1">
                            <option>GMV</option>
                        </select>
                    </div>
                    <div class="order-by">
                        <h5>Order by</h5>
                        <select class="custom-select1">
                            <option>Month to Date</option>
                        </select>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="earning">
                    <div class="total-earning">
                        <h4>Total Earnings</h4>
                        <h4 class="text-main-color mb-0">$17,320</h4>
                    </div>
                    <div class="m-auto">
                        <p class="mb-0 text-main-color">vs</p>
                    </div>
                    <div class="total-earning">
                        <h4>Net Earnings</h4>
                        <h4 class="text-main-color mb-0">$8,320</h4>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="chart-container">
                    <canvas id="bar-chart" width="100%" height="76%"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 mt-3">
        <div class="chart">
            <h4>Orders</h4>
            <div class="divider"></div>
            <div class="d-flex custom-btn-group">
                <button class="btn custom-btn">Recent</button>
                <button class="btn custom-btn deactive">Pending</button>
                <button class="btn custom-btn deactive">Completed</button>
                <button class="btn custom-btn deactive">Refunded(Expired)</button>
                <button class="btn custom-btn deactive">Refuned(Declined)</button>
                <button class="btn custom-btn deactive">Paid Out</button>
            </div>
            <div class="divider"></div>
            <div class="datatable">
                <div class="table-responsive">
                    <table class="table zero-configuration">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Order ID</th>
                                <th>By Fans</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="recent-rectangle my-auto mr-2"></div>
                                        <span>Recent</span>
                                    </div>
                                </td>
                                <td class="user">
                                    <p class="mb-0 text-main-color">#2175</p>
                                </td>
                                <td>
                                    <p class="mb-0 description">John Doe</p>
                                </td>
                                <td>
                                    <p class="date mb-0">20 Sep 2021 at 10.40 PM</p>
                                </td> 
                                <td>
                                    <button class="btn custom-btn">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="pending-rectangle my-auto mr-2"></div>
                                        <span>Pending</span>
                                    </div>
                                </td>
                                <td class="user">
                                    <p class="mb-0 text-main-color">#2175</p>
                                </td>
                                <td>
                                    <p class="mb-0 description">John Doe</p>
                                </td>
                                <td>
                                    <p class="date mb-0">20 Sep 2021 at 10.40 PM</p>
                                </td> 
                                <td>
                                    <button class="btn custom-btn">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="completed-rectangle my-auto mr-2"></div>
                                        <span>Completed</span>
                                    </div>
                                </td>
                                <td class="user">
                                    <p class="mb-0 text-main-color">#2175</p>
                                </td>
                                <td>
                                    <p class="mb-0 description">John Doe</p>
                                </td>
                                <td>
                                    <p class="date mb-0">20 Sep 2021 at 10.40 PM</p>
                                </td> 
                                <td>
                                    <button class="btn custom-btn">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="expired-rectangle my-auto mr-2"></div>
                                        <span>Refuned (Expired)</span>
                                    </div>
                                </td>
                                <td class="user">
                                    <p class="mb-0 text-main-color">#2175</p>
                                </td>
                                <td>
                                    <p class="mb-0 description">John Doe</p>
                                </td>
                                <td>
                                    <p class="date mb-0">20 Sep 2021 at 10.40 PM</p>
                                </td> 
                                <td>
                                    <button class="btn custom-btn">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="declined-rectangle my-auto mr-2"></div>
                                        <span>Refunded (Declined)</span>
                                    </div>
                                </td>
                                <td class="user">
                                    <p class="mb-0 text-main-color">#2175</p>
                                </td>
                                <td>
                                    <p class="mb-0 description">John Doe</p>
                                </td>
                                <td>
                                    <p class="date mb-0">20 Sep 2021 at 10.40 PM</p>
                                </td> 
                                <td>
                                    <button class="btn custom-btn">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="paidout-rectangle my-auto mr-2"></div>
                                        <span>Paid Out</span>
                                    </div>
                                </td>
                                <td class="user">
                                    <p class="mb-0 text-main-color">#2175</p>
                                </td>
                                <td>
                                    <p class="mb-0 description">John Doe</p>
                                </td>
                                <td>
                                    <p class="date mb-0">20 Sep 2021 at 10.40 PM</p>
                                </td> 
                                <td>
                                    <button class="btn custom-btn">View</button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="d-none">
                            <tr>
                                <th>Status</th>
                                <th>Order ID</th>
                                <th>By Fans</th>
                                <th>Date</th>
                                <th>Action</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
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

// ------------------------ line chart js ------------------

const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt'];
const data = {
    labels: labels,
    datasets: [
        {
            label: 'Jan',
            data: [0, 100, 150, 200, 350, 400, 250, 500, 450, 360],
            borderColor: 'rgba(255, 193, 7, 1)',
            backgroundColor: 'rgba(255, 193, 7, 1)',
            borderWidth: 5
        },
        {
            label: 'Feb',
            data: [0, 250, 150, 300, 350, 300, 250, 200, 350, 450],
            borderColor: 'rgba(33, 120, 249, 1)',
            backgroundColor: 'rgba(33, 120, 249, 1)',
            borderWidth: 5
        },
        {
            label: 'Mar',
            data: [0, 150, 150, 350, 300, 400, 250, 500, 350, 450],
            borderColor: 'rgba(255, 51, 92, 1)',
            backgroundColor: 'rgba(255, 51, 92, 1)',
            borderWidth: 5
        },
    ]
};

var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'line',
    data: data,
    backgroundColor: "white",
    options: {
        responsive: true,
        scales: {
            xAxes: [{
                gridLines: {
                    color: "rgba(255, 0, 0, 0)",
                }
            }],
            yAxes: [{
                gridLines: {
                    color: "rgba(255, 0, 0, 0)",
                }   
            }]
        }
    },
});


// --------------  bar chat js ---------------

var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var color = Chart.helpers.color;
var barChartData = {
  labels: ['1/4', '2/4', '3/4', '4/4', '5/4', '6/4', '7/4'],
  datasets: [{
    label: 'Dataset 1',
    backgroundColor: '#FF335C',
    borderRadius: 10,
    borderSkipped: false,
    data: [
      10,
      40,
      30,
      20,
      50,
      20,
      40
    ]
  }]
};

window.onload = function() {
  var ctx = document.getElementById('bar-chart').getContext('2d');
  window.myBar = new Chart(ctx, {
    type: 'bar',
    data: barChartData,
    options: {
      responsive: true,
      scales: {
            xAxes: [{
                barPercentage: 0.1,
                gridLines : {display : false}      
            }
            ],
            yAxes: [{
                    gridLines : {display : false},
                    ticks: {
                        suggestedMin: 50,
                        suggestedMax: 100
                    }
                }]
        }
    }
  });
};
</script>
@endsection