
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
        <tbody id='table-content'>
            @foreach($orders as $order)
            @php
                $order_status = '';
                switch ($order->order_status) {
                case 0:
                    $order_status = 'Pending';
                    $order_status_color = 'pending-rectangle';
                    break;
                case 1:
                    $order_status = 'Completed';
                    $order_status_color = 'completed-rectangle';
                    break;
                case 2:
                    $order_status = 'Paid Out';
                    $order_status_color = 'paidout-rectangle';
                    break;
                case 3:
                    $order_status = 'Refunded (Declined)';
                    $order_status_color = 'declined-rectangle';
                    break;
                case 4:
                    $order_status = 'Refuned (Expired)';
                    $order_status_color = 'expired-rectangle';
                    break;
                case 5:
                    $order_status = 'Recent';
                    $order_status_color = 'recent-rectangle';
                    break;
                default:
                    $order_status = 'Recent';
                    $order_status_color = 'recent-rectangle';
                }
            @endphp
            <tr>
                <td>
                    <div class="d-flex">
                        <div class="{{ $order_status_color }} my-auto mr-2"></div>
                        <span>{{ $order_status }}</span>
                    </div>
                </td>
                <td class="user">
                    <p class="mb-0 text-main-color">#{{ $order->order_id }}</p>
                </td>
                <td>
                    @php
                        $fans = DB::table('users')->where('id', $order->order_fans_id)->first();
                    @endphp
                    <p class="mb-0 description">{{ $fans->name }}</p>
                </td>
                <td>
                    <p class="date mb-0">{{  Carbon\Carbon::parse($order->created_at)->format('d F Y h:m') }}</p>
                </td> 
                <td>
                    <button class="btn custom-btn">View</button>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
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