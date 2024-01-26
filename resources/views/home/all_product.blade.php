<!DOCTYPE html>
<html>
   <head>
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
      </div>
      <!-- arrival section -->
      <!-- end arrival section -->
      <!-- product section -->
      @include('home.product_view')
      <!-- end product section -->
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© All Rights Reserved By .......<br>
         
            Distributed By .........
         
         </p>
      </div>
      <script>
         document.addEventListener("DOMContentLoaded" , function(event){
            var scrollpos=localStorage.getItem('scrollpos');
            if(scrollpos) window.scrollTo(0,scrollpos);
         });
            window.onbeforeunload= function(e){
               localStorage.setItem('scrollpos',window.scrollY);
            };
      </script>
      <script>
         document.addEventListener("DOMContentLoaded" , function(event){
            var scrollpos=localStorage.getItem('scrollpos');
            if(scrollpos) window.scrollTo(0,scrollpos);
         });
            window.onbeforeunload= function(e){
               localStorage.setItem('scrollpos',window.scrollY);
            };
      </script>
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