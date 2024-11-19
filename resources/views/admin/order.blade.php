<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .title_deg {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }
        .input_color{
            color: black;
        }
        .table_deg {
            border: 2px solid white;
            width: 100%;
            margin: auto;
            padding-top: 50px;
            text-align: center;
        }
        .div_center{
            text-align:center;
            padding-top: 40px;
        }
        /*.th_deg {
            background-color: skyblue;
        }*/

        .img_size {
            width: 200px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <div class="main-panel">
                <div class="content-wrapper">
                <div class="div_center"> 
                <h2 class="title_deg">All orders</h2>
                <form action="{{url('/product_search')}}" method="GET">
                    @csrf
                    <input type="text" class="input_color" name="category" placeholder="search here ">
                    <input type="submit" name="submit" class="btn btn-primary" value="Search">
                </form>
            </div>
                        <div id="searchResults"></div>
                    </div>
                    <table class="table_deg">
                        <tr class="th_deg">
                            <th style="padding:10px;">Name</th>
                            <th style="padding:10px;">Email</th>
                            <th style="padding:10px;">Address</th>
                            <th style="padding:10px;">Phone</th>
                            <th style="padding:10px;">Product title</th>
                            <th style="padding:10px;">Quantity</th>
                            <th style="padding:10px;">Price</th>
                            <th style="padding:10px;">Payment status</th>
                            <th style="padding:10px;">Delivery status</th>
                            <th style="padding:10px;">Image</th>
                            <th style="padding:10px;">Delivered</th>
                            <th style="padding:10px;">Print PDF</th>
                            <th style="padding:10px;">Send mail</th>
                        </tr>
                        @forelse($order as $order)
                        <tr class="">
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                                <img class="img_size" src="/product/{{$order->image}}" alt="" srcset="">
                            </td>
                            <td>
                                @if($order->delivery_status=='processing')
                                <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered!! ')"
                                    class="btn btn-primary">Delivered</a>
                                @else
                                <p style="color:green;">Delivered</p>
                                @endif
                            </td>
                            <td>
                                <a href="" class="btn btn-secondary">Print pdf</a>
                            </td>
                            <td>
                                <a href="{{url('send_email', $order->id)}}" class="btn btn-info">Send mail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13">
                                No data found
                            </td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
            <!-- main-panel ends -->
            <!-- page-body-wrapper ends -->
            <!-- container-scroller -->
            <!-- plugins:js -->
            @include('admin.script')
            <!-- End custom js for this page -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function searchAjax() {
        var searchParams = {
            search: $('#searchInput').val()
        };

        $.ajax({
            type: 'GET',
            url: "{{ route('order.search.ajax') }}",
            data: searchParams,
            success: function(response) {
                $('#searchResults').html(response.orders);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>

</body>

</html>
