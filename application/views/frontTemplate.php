<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">

        <link href="<?php echo asset_url(); ?>assets/fonts/profession/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo asset_url(); ?>assets/css/Custom.css" rel="stylesheet" type="text/css">
        <link href="<?php echo asset_url(); ?>assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo asset_url(); ?>assets/libraries/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo asset_url(); ?>assets/libraries/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo asset_url(); ?>assets/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo asset_url(); ?>assets/css/profession-black-green.css" rel="stylesheet" type="text/css" id="style-primary">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/js/jquery.js"></script> 
        <script src="<?php echo asset_url(); ?>assets/js/jquery-ui.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo asset_url(); ?>assets/favicon.png">
        <title>Pharma Talent</title>
        <style>
            .document-title{
                padding: 11px 0px;margin-bottom: 10px
            }
        </style>
    </head>
    <body class="hero-content-dark footer-dark">
        <div class="page-wrapper">
            <div class="header-wrapper">
                <div class="header">
                    <div class="header-top">
                        <div class="container">
                            <div class="header-brand">
                                <div class="header-logo">
                                    <a href="<?php echo site_url('Job/index'); ?>">
                                        <i class="profession profession-logo"></i>
                                        <span class="header-logo-text">Pharma Talent</span>
                                    </a>
                                </div>
                                <div class="header-slogan">
                                    <span class="header-slogan-slash">|</span>
                                    <span class="header-slogan-text"></span>

                                </div><!-- /.header-slogan-->
                            </div><!-- /.header-brand -->

                            <ul class="header-nav nav nav-pills collapse header-actions">
<!--                                <li><a href="#">Jobs <i class="fa fa-chevron-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="companies.html">Company Listing</a></li>
                                        <li><a href="company-detail.html">Company Detail</a></li>
                                    </ul>
                                </li>-->
                                <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
                                <li><a href="<?php echo site_url('User/linkedInRegister'); ?>">Register</a></li>
<<<<<<< HEAD
                                <li><a href="<?php echo site_url('Employee/Home'); ?>" class="primary">Recruiters</a></li>
=======
                                <li><a href="<?php echo site_url('Employee/register'); ?>" class="primary">Recruiters</a></li>
>>>>>>> dcdce0c591c7a76e290ae26212873bb4f1f124a3
                            </ul><!-- /.header-actions -->

                            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div><!-- /.container -->
                    </div><!-- /.header-top -->

                    <!--                    <div class="header-bottom">
                                            <div class="container">
                                                <ul class="header-nav nav nav-pills collapse">
                                                    <li class="active">
                                                        <a href="index.html">Home</a>
                                                    </li>
                    
                                                    <li >
                                                        <a href="#">Companies <i class="fa fa-chevron-down"></i></a>
                    
                                                        <ul class="sub-menu">
                                                            <li><a href="companies.html">Company Listing</a></li>
                                                            <li><a href="company-detail.html">Company Detail</a></li>
                                                        </ul>
                                                    </li>
                    
                                                    <li >
                                                        <a href="#">Positions <i class="fa fa-chevron-down"></i> </a>
                                                        <ul class="sub-menu">
                                                            <li><a href="positions.html">Position Listing</a></li>
                                                            <li><a href="position-detail.html">Position Detail</a></li>
                                                        </ul>
                                                    </li>
                    
                                                    <li >
                                                        <a href="#">Candidates <i class="fa fa-chevron-down"></i></a>
                    
                                                        <ul class="sub-menu">
                                                            <li><a href="candidates.html">Candidates List</a></li>
                                                            <li><a href="resume.html">Resume</a></li>
                                                            <li><a href="create-resume.html">Create Resume</a></li>
                                                        </ul> /.sub-menu 
                                                    </li>
                    
                                                    <li >
                                                        <a href="#">Pages <i class="fa fa-chevron-down"></i></a>
                    
                                                        <ul class="sub-menu">
                                                            <li><a href="pricing.html">Pricing</a></li>
                                                            <li><a href="login.html">Login</a></li>
                                                            <li><a href="registration.html">Registration</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                    
                                                <div class="header-search hidden-sm">
                                                    <form method="get" action="http://preview.byaviators.com/template/profession/index.html?">
                                                        <input type="text" class="form-control" placeholder="Search ...">
                                                    </form>
                                                </div> /.header-search 
                                            </div> /.container 
                                        </div> /.header-bottom -->
                </div><!-- /.header -->
            </div><!-- /.header-wrapper-->


            <div class="main-wrapper">
                <div class="main">
                    <?php $this->load->view($content, $view_data); ?>
                </div><!-- /.main -->
            </div><!-- /.main-wrapper -->

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Login</h4>
                        </div>
                        <?php echo form_open('User/login') ?>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group col-sm-6">
                                        <label >E-mail</label>
                                        <input type="text" class="form-control" name="email"/>
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6" >
                                        <label >Password</label>
                                        <input type="password" class="form-control" name="password"/>
                                    </div><!-- /.form-group -->

                                </div><!-- /.col-* -->
                            </div><!-- /.row -->

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">Login</button>
                            <a class="btn btn-social btn-linkedin" href="<?php echo site_url('Linkedin_signup/initiate'); ?>">
                                <i class="fa fa-linkedin"></i> Sign in with LinkedIn
                            </a>                          

                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php $this->load->view('footer', $view_data); ?>

        </div><!-- /.page-wrapper -->

        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/js/jquery.ezmark.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js"></script>
<!--        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js"></script>-->
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-fileinput/js/fileinput.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-select/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/cycle2/jquery.cycle2.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/cycle2/jquery.cycle2.carousel.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/countup/countup.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/js/profession.js"></script>
    </body>
</html>