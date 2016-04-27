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
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/js/jquery.js"></script>        
        <script type="text/javascript" src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
        <script src="<?php echo asset_url(); ?>assets/js/jquery-ui.js" type="text/javascript"></script>
        <link href="<?php echo asset_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo asset_url(); ?>assets/js/datepicker.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo asset_url(); ?>assets/favicon.png">
        <title>Pharma Talent</title>
        <style>
            .header-nav .sub-menu {
                top: 48px;
            }

            .sub-menu2 li {
                padding: 2px;
                padding-left: 30px;

            }
            .sub-menu2 li a{
                color: #000;
            }
            .document-title {
                padding: 14px 0px;
                margin: -60px 0px 26px 0px;
            }
            .resume-main-verified {
                background-color: #55a747;
                border-radius: 50%;
                color: #fff;
                display: inline-block;
                font-size: 10px;
                height: 20px;
                line-height: 18px;
                margin: 0px 0px 0px 15px;
                text-align: center;
                vertical-align: 0px;
                width: 19px;
            }

            .resume-chapter {
                padding-top: 20px;
            }

            .header-nav li {
                padding-bottom:4px;
                padding-top: 3px;
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
                                </div><!-- /.header-logo-->

                                <div class="header-slogan">
                                    <span class="header-slogan-slash">|</span>
                                    <span class="header-slogan-text"></span>

                                </div><!-- /.header-slogan-->

                            </div><!-- /.header-brand -->
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
                                <?php
                                $CI = & get_instance();
                               // $this->load->view('Sidebar', $CI->loadSidebar());
                                ?>

                            </ul>

                        </div>
                    </div> -->
                </div><!-- /.header -->
            </div><!-- /.header-wrapper-->
            <div class="main-wrapper">
                <div class="main">
                    <div class="container-fluid">

<!--                        <div class="row">
                            <div class="col-sm-12">
                                <div class="document-title">
                                    <div class="container">
                                        <div class="col-sm-4" >
                                            <input type="text" class="form-control" placeholder="Job Skill">
                                        </div>
                                        <div class="col-sm-4" >
                                            <input type="text" class="form-control" placeholder="Location">
                                        </div>
                                        <div class="col-sm-2" >
                                            <input type="text" class="form-control" placeholder="Experience">
                                        </div>
                                        <div class="col-sm-2" >
                                            <input type="button" class="btn btn-default" value="Search Job">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>-->
                        <div class="row">
                            <div class="col-sm-12" style="padding-left: 0px">
                                <?php $this->load->view($content, $view_data); ?>
                            </div>
                        </div>
                    </div>

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
                        </form>
                        <div class="modal-footer">
                            <a href="<?php echo site_url('Linkedin_signup/initiate'); ?>">Linked In</a>
                            <button type="submit" class="btn btn-secondary">Login</button>
                            <a href="<?php echo site_url('User/register') ?>">Click Here To Register</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-wrapper">
                <div class="footer">
                    <div class="footer-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="footer-top-block">
                                        <h2><i class="profession profession-logo"></i> Pharma Talent</h2>

                                        <p>
                                            Fusce congue, risus et pulvinar cursus, orci arcu tristique lectus, sit amet placerat justo ipsum eu diam. Pellentesque tortor urna, pellentesque nec molestie eget, volutpat in arcu. Maecenas a lectus mollis.
                                        </p>

                                        <ul class="social-links">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                                        </ul>
                                    </div><!-- /.footer-top-block -->
                                </div><!-- /.col-* -->

                                <div class="col-sm-3 col-sm-offset-1">
                                    <div class="footer-top-block">
                                        <h2>Helpful Links</h2>

                                        <ul>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Support</a></li>
                                            <li><a href="#">License</a></li>
                                            <li><a href="#">Affiliate</a></li>
                                            <li><a href="pricing.html">Pricing</a></li>
                                            <li><a href="#">Terms &amp; Conditions</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </div><!-- /.footer-top-block -->
                                </div><!-- /.col-* -->

                                <div class="col-sm-3">
                                    <div class="footer-top-block">
                                        <h2>Trending Jobs</h2>

                                        <ul>
                                            <li><a href="position-detail.html">Android Developer</a></li>
                                            <li><a href="position-detail.html">Senior Teamleader</a></li>
                                            <li><a href="position-detail.html">iOS Developer</a></li>
                                            <li><a href="position-detail.html">Junior Tester</a></li>
                                            <li><a href="position-detail.html">Full Stack Developer</a></li>
                                            <li><a href="position-detail.html">Node.js Developer</a></li>
                                            <li><a href="position-detail.html">Scala Developer</a></li>
                                        </ul>
                                    </div><!-- /.footer-top-left -->
                                </div><!-- /.col-* -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.footer-top -->

                    <div class="footer-bottom">
                        <div class="container">
                            <div class="footer-bottom-left">
                                &copy; <a href="#">Pharma Talent</a>, 2016 All rights reserved.
                            </div><!-- /.footer-bottom-left -->

                            <div class="footer-bottom-right">
                                Created by <a href="http://byaviators.com/">Aviators</a>. Premium themes and templates.
                            </div><!-- /.footer-bottom-right -->
                        </div><!-- /.container -->
                    </div><!-- /.footer-bottom -->
                </div><!-- /.footer -->
            </div>

        </div><!-- /.page-wrapper -->

        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/js/jquery.ezmark.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-fileinput/js/fileinput.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-select/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/cycle2/jquery.cycle2.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/cycle2/jquery.cycle2.carousel.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/countup/countup.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>assets/js/profession.js"></script>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Ptalent_home_upper -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-4494527869099710"
             data-ad-slot="2079045313"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

    </body>
</html>