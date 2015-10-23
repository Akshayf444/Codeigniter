<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $title ?></title>
        <?php $this->load->view('links'); ?>
        <style>
            .job-advanced-search {
                top: 120px;
                display: block;
                padding: 10px;
                position: absolute;
                z-index: 1;
                width: 85%;
               text-align: center;             
            }

            .form-control{
                height: 50px;
                padding: 6px 12px;
            }
            .btn-lg{
                padding: 12px 16px;
            }
        </style>
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
                        <ul class="nav navbar-nav ">
                            <li>
                                <a href="#">Job</a>
                            </li>
                            <li>
                                <a href="#">Companies</a>
                            </li>
                            <li>
                                <a href="">Login</a>
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
        <?php if (isset($frontImage) && $searchBar == TRUE) { ?>
            <div class="container-fluid">
                <div class="row">
                    <img src="<?php echo asset_url() ?>images/<?php echo $frontImage ?>" class="img-responsive">
                    <div class="row">
                        <div class="container ">
                            <div class="job-advanced-search" >
                                <div class="row">
                                    <h2 class="text-danger">Join us & Explore thousands of Jobs</h2>
                                </div>
                                <div class="row" style="opacity: 0.8; background: #fff;padding: 10px">  
                                    <div class="col-lg-3"><input type="text" class="form-control btn-lg"></div>
                                    <div class="col-lg-3"><input type="text" class="form-control btn-lg"></div>
                                    <div class="col-lg-3"><input type="text" class="form-control btn-lg"></div>
                                    <div class="col-lg-3"><input type="submit" class="btn btn-success btn-lg btn-block" value="Search"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="section" >
            <div class="container" >
                <?php $this->load->view($content, $view_data); ?>
            </div>
        </div>
        <?php $this->load->view('footer'); ?>


        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo asset_url() ?>/js/bootstrap.min.js"></script>    
    </body>
</html>
<script><?php echo $dropdowns[2]; ?></script>