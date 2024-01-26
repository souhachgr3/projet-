
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center{
            text-align:center;
            padding-top: 40px;
        }
        .font_size{
            font-size:40px;
            padding-bottom:40px;
        }
        .text_color{
           color:black; 
           padding-bottom:20px;
        }
        label{
            display:inline-block;
            width:200px;
        }
        .div_design{
            padding-bottom:15px;
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
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif
            <div class="div_center">
                <h1 class="font_size">Add product</h1>
                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="div_design">
                    <label for="">Product Title :</label>
                    <input type="text" class="text_color" name="title" placeholder="Write a title" required>
                </div>
                <div class="div_design">
                    <label for="">Product Description :</label>
                    <input type="text" class="text_color" name="description" placeholder="Write a Description"required>
                </div>
                <div class="div_design">
                    <label for="">Product price :</label>
                    <input type="number" name="price" class="text_color" name="price" placeholder="Write a price"required>
                </div>
                <div class="div_design">
                    <label for="">Discount price:</label>
                    <input type="number" name="dis_price" class="text_color" name="dis_price" placeholder="Write a discount price">
                </div>
                <div class="div_design">
                    <label for="">Product quantity :</label>
                    <input type="number" name="quantity" class="text_color" min="0" name="quantity" placeholder="Write a quantity" required>
                </div>

                <div class="div_design">
                    <label for="">Product Category :</label>
                    <select class="text_color" name="category" id="" required>
                        <option value="" selected="">Add a category here </option>
                        @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="div_design">
                    <label for="">Product Image :</label>
                    <input type="file" class="" name="image"  required>
                </div>
                <div class="div_design">
                    <input type="submit" value="Add product" class="btn btn-primary">
                </div>
                </form>
            </div>
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