<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('')}}">
    <link rel="icon" href="img/favicon.ico">
    <title>BKFA | Kansaibook</title>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/list.css"  rel="stylesheet">
    <link href="css/home.css"  rel="stylesheet">
    <link href="css/footer.css"  rel="stylesheet">
</head>

<body>

    <div class="container"> 
        @include('pages.layouts.menu') 
    </div>
    <div class="kc"></div>
    <main role="main" class="container">
        <div class="row content">
           
           @yield('content')
            <!-- /.blog-main -->
            @include('pages.box_right')
            <!-- /.blog-sidebar -->
        </div>
        <!-- /.row -->
    </main>

    @include('pages.layouts.footer')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
    <script>
    	$(function() {
	        'use strict'

	        $('[data-toggle="offcanvas"]').on('click', function() {
	            $('.offcanvas-collapse').toggleClass('open')
	        })
	    })
	    $(document).ready(function() {
	        $(document).on("focus", '[data-action="grow"]', function() {
	            $(window).width() > 1200 && $(this).animate({ width: 300 })
	        });

	        $(document).on("blur", '[data-action="grow"]', function() {
	            if ($(window).width() > 1200) {
	                $(this).animate({ width: 190 })
	            }
	        });
	    });
    </script>
    @yield('script')
</body>

</html>