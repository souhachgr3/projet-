
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <style>
        label{
            display:inline-block;
            width:300px;
            font-size:15px;
            font-weight:bold;
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
            <h1 style="text-align:center ; font-size:25px;">Send email to {{$order->email}}</h1>
            <form action="{{url('send_user_email',$order->id)}}" method="POST">
                @csrf
                <div style="padding-left:35% ; padding-top:30px;">
                <label for="">Email Greeting</label>
                <input type="text" name="greeting">
            </div>
            <div style="padding-left:35% ; padding-top:30px;">
                <label for="">Email firstling</label>
                <input type="text" name="firstling">
            </div>
            <div style="padding-left:35% ; padding-top:30px;">
                <label for="">Email body</label>
                <input type="text" name="body">
            </div>
            <div style="padding-left:35% ; padding-top:30px;">
                <label for="">Email Button name</label>
                <input type="text" name="button">
            </div>
            <div style="padding-left:35% ; padding-top:30px;">
                <label for="">Email url</label>
                <input type="text" name="url">
            </div>
            <div style="padding-left:35% ; padding-top:30px;">
                <label for="">Email last line</label>
                <input type="text" name="lastline">
            </div>
            <div style="padding-left:35% ; padding-top:30px;">
            <input type="submit" value="send email" class="btn btn-primary">
            </div>
            </form>
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