
<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
        .center{
            margin:auto;
            width:50%;
            border:2px solid white;
            padding-bottom:60px;
        }
        .font_size{
            text-align:center;
            font-size:40px;
            padding-top:20px;
        }
        .img_size{
           width:150px; 
           height:120px
        }
        /*.th_color{
            background:skyblue;
        }*/
        .th_deg{
            padding:30px;
        }
    </style>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif
            <h2 class="font_size">All products</h2>
            <table class="center">
                <tr class="th_color">
                    <th class="th_deg">Product title</th>
                    <th class="th_deg">description</th>
                    <th class="th_deg">quantity</th>
                    <th class="th_deg">category</th>
                    <th class="th_deg">price</th>
                    <th class="th_deg">discount price</th>
                    <th class="th_deg">product image</th>
                    <th class="th_deg">delete</th>
                    <th class="th_deg">edit</th>
                </tr>
                @foreach($product as $product)
                <tr class="">
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>
                        <img class="img_size" src="/product/{{$product->image}}" alt="" srcset="">
                    </td>

                    <td>
                        <a class="btn btn-danger" onclick="return confirm('are you sure you mant to delete this')" href="{{url('delete_product',$product->id)}}">Delete</a>
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Update</a>
                    </td>
                </tr>
                @endforeach
            </table>
           </div>
        </div>
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>