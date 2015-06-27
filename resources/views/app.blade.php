<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">-->

    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="vendor/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">

        @include('menu')

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            @yield('title')
                        </h1>
                        @yield('breadcrumb')
                    </div>
                </div>
                
                @yield('content')
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>


    <!-- jQuery -->
    <script src="vendor/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/js/plugins/morris/raphael.min.js"></script>
    <script src="vendor/js/plugins/morris/morris.min.js"></script>
    <script src="vendor/js/plugins/morris/morris-data.js"></script>
</body>
</html>
