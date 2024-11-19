<!DOCTYPE html>
<html>
   <head>
    <style>
        .center{
            text-align:center;
            margin:auto;
            width: 70%;
            padding:30px;
        }
        table , th ,td{
            border:1px solid black;
        }
        .th_deg{
            padding:10px;
            /*background-color:skyblue;*/
            font-size:20px;
            font-weight:bold;
        }
    </style>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>e-commerce</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <div class="center">
            <table>
                <tr class="th_deg">

                    <th >Product title</th>
                    <th>Quantity</th>
                    <th>price</th>
                    <th>payment status</th>
                    <th>Delivery status</th>
                    <th>Image</th>
                    <th>Cancel order</tr>
                <tr>
                    @foreach($order as $order)
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                        <img width="180" height="100" src="product/{{$order->image}}" alt="">
                    </td>
                    <td>
                        @if($order->delivery_status=='processing')
                        <a onclick="return confirm('are you sure youn want to cancel this order?') " class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel order</a>
                    </td>
                    @else
                    <p style="color:blue;">Not allowed</p>
                    @endif
                    

                </tr>
                @endforeach
            </table>
         </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>