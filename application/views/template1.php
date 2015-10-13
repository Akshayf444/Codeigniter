<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $title ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo asset_url() ?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo asset_url() ?>/css/style.css" rel="stylesheet">

        <!-- Custom CSS -->
        <!--        <link href="css/half-slider.css" rel="stylesheet">-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid" >
                <div class="row col-sm-offset-1">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#" id="homeLogo"><img class="img-responsive" src="<?php echo asset_url() ?>/images/logo.jpg" alt=""/></a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#">ABOUT</a>
                            </li>
                            <li>
                                <a href="#">SERVICES</a>
                            </li>
                            <li>
                                <a href="logout">LOGOUT</a>
                            </li>
                            <li>
                                <a href="#"></a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- Page Content -->
        <div class="section" >
            <div class="container" >
                <?php $this->load->view($content); ?>
            </div>
        </div>
        <footer class="section section-primary"> 
            <div class="container"> 
                <div class="row">
                    <div class="col-sm-6"> 
                        <h1>Footer header</h1> <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua. <br>Ut enim ad minim veniam, quis nostrud</p></div><div class="col-sm-6"> 
                        <p class="text-info text-right"> <br><br></p>
                        <div class="row"> 
                            <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left"> 
                                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a> 
                                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a> 
                                <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a> 
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-12 hidden-xs text-right">
                                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a> 
                                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a> 
                                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a> 
                                <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="<?php echo asset_url() ?>/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo asset_url() ?>/js/bootstrap.min.js"></script>    
    </body>
</html>