<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/countup/countup.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/choosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/choosen/chosen.proto.js"></script>
<link href="<?php echo asset_url(); ?>assets/libraries/choosen/chosen.min.css" rel="stylesheet" type="text/css" id="style-primary">
<style>
    .searchbox{
        padding: 5px;
    }
    .inputlg{
        height: 60px;
    }
    .bootstrap-tagsinput{
        width: 100%;
        height: 60px;

    }
    .recruit span {
        display: block;
        background: transparent url("<?php echo asset_url(); ?>assets/img/home.png") no-repeat scroll 0% 0%;
        width: 34px;
        height: 28px;
        margin: 10px 44%;
    }
    .recruit  span.cand {
        background-position: -46px -51px;
        width: 30px;
        height: 40px;
    }
    .recruit span.match {
        background-position: -78px -56px;
    }

    .recruit  span.company {
        background-position: -124px -57px;
    }
    .cand {
        color: #062937;
        float: left;
        font-size: 12px;
        height: 40px;
        margin: 9px 5px 0px;
        text-shadow: 1px 1px 1px #FFF;
        width: 120px;
        text-transform: uppercase;
    }

    .testmonial{
        background-color: #46b8da;
    }

    .dropdown-toggle{
        height: 60px;
    }
</style>
<div class="hero-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 ">
                <div class="col-lg-12" style="text-align: center">
                    <h1 style="font-size: 30px;">We offer <span class="noofjob">1,259</span> job vacancies right now!</h1>
                </div>

                <?php
                $attribute = array('method' => 'get');
                echo form_open('Job/Search', $attribute);
                ?>
                <div class="row">
                    <div class="form-group col-sm-5 searchbox"  >
                        <input type="text" class="form-control inputlg" name="skill" placeholder="Job / Skill / Company etc">
                    </div><!-- /.form-group -->
                    <div class="form-group col-sm-5 searchbox" >
                        <select name="location[]" class="inputlg form-control" data-role="tagsinput" multiple >
                            <?php echo $dropdowns; ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-2 searchbox" >
                        <button type="submit" class="btn btn-block btn-secondary inputlg" style="font-size: 22px">Search</button>
                    </div><!-- /.form-group -->
                </div><!-- /.row -->
                </form>

            </div><!-- /.col-* -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.hero-content -->
<div class="stats">
    <div class="container">
        <div class="row">
            <div class="stat-item col-sm-4" data-to="123012">
                <strong id="stat-item-1">0</strong>
                <span>Jobs Added</span>
            </div><!-- /.col-* -->

            <div class="stat-item col-sm-4" data-to="187432">
                <strong id="stat-item-2">0</strong>
                <span>Active Resumes</span>
            </div><!-- /.col-* -->

            <div class="stat-item col-sm-4" data-to="140312">
                <strong id="stat-item-3">0</strong>
                <span>Positions Matched</span>
            </div><!-- /.col-* -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.stats -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-4">

        </div>

        <div class="col-sm-12 col-md-8">
            <div class="col-lg-12 col-sm-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active" >
                        <a href="<?php //echo site_url('User/login');                     ?>" aria-controls="personal" role="tab" data-toggle="tab">
                            <strong>Top Companies</strong>

                        </a>
                    </li>
                    <li role="presentation" >
                        <a href="<?php //echo site_url('Employee/login');                     ?>" aria-controls="company" role="tab" data-toggle="tab">
                            <strong>Top Consultancy</strong>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" style="margin-bottom: 10px">
                    <div role="tabpanel" class="tab-pane active col-sm-10 col-xs-10" id="personal">
                        <div class="candidate-boxes">
                            <?php for ($i = 0; $i < 10; $i++) { ?>
                                <div class="col-sm-3 col-md-2 col-xs-4">
                                    <div class="candidate-boxes">
                                        <div class="candidate-box-image">
                                            <img src="http://static2.shine.com/media1/images/employerbranding/53dc42190ce94a1394f3f84b7057a252.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="company">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12" style="margin-top: 20px">
                <h2 class="page-header" >Browse Jobs</h2>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active" >
                        <a href="<?php //echo site_url('User/login');                     ?>" aria-controls="industry" role="tab" data-toggle="tab">
                            <strong>Industry</strong>

                        </a>
                    </li>
                    <li role="presentation" >
                        <a href="<?php //echo site_url('Employee/login');                     ?>" aria-controls="company" role="tab" data-toggle="tab">
                            <strong>Functional Area</strong>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="industry">
                        <div class="col-sm-12">
                            <ul>
                                <li>IT/Software Job</li>
                                <li>BPO/Software Job</li>
                                <li>IT/Software Job</li>
                            </ul>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="company">

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="container-fluid">
    <div class="block background-secondary fullwidth candidate-title" style="padding-top: 10px;margin-bottom: 30px">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-12" style="text-align: center">
                    <h2 class="header-logo-text">Apply For Jobs On The Go.</h2>
                    <div class="col-sm-2 col-sm-offset-5">
                        <img src="<?php echo asset_url(); ?>assets/img/playstore2.png" alt="Get It On Play Store" style="width: 100%">
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div>
<div class="clearfix"></div>
<div class="container">
    <div class="panels-highlighted">
        <div class="row">
            <div class="panel-highlighted-wrapper col-sm-6">
                <div class="panel-highlighted-inner panel-highlighted-secondary">
                    <h2>Hire an employee</h2>
                    <p>
                        Vivamus congue rhoncus sem et placerat. Fusce nec nunc lobortis lorem ultrices facilisis. Ut dapibus blandit nunc, et consectetur dui.
                    </p>

                    <a href="<?php echo site_url('Employee/register'); ?>" class="btn btn-white">Sign up as company</a>
                </div><!-- /.panel-inner -->
            </div><!-- /.panel-wrapper -->

            <div class="panel-highlighted-wrapper col-sm-6">
                <div class="panel-highlighted-inner panel-highlighted-primary panel">
                    <h2>Looking for a job</h2>

                    <p>
                        Vivamus congue rhoncus sem et placerat. Fusce nec nunc lobortis lorem ultrices facilisis. Ut dapibus blandit nunc, et consectetur dui.
                    </p>

                    <a href="<?php echo site_url('User/register'); ?>" class="btn btn-white">Sign up as employee</a>
                </div><!-- /.panel-inner -->
            </div><!-- /.panel-wrapper -->
        </div><!-- /.row-->
    </div><!-- /.panels -->
</div>
<div class="container" style="background: #cccccc;padding-bottom: 10px">
    <div class="col-sm-12" style="border: 0;">
        <div class="row ">
            <h2>Recruit smart, recruit right</h2>
            <label class="label label-default pull-right" style="font-size: 14px" >Post a job for almost free</label>
        </div>
        <div class="row recruit">
            <div class="col-sm-4" style="text-align: center" >
                <span class="cand"></span>
                <h5>More than 1.9 crore candidates</h5>
            </div><!-- /.panel-wrapper -->

            <div class=" col-sm-4" style="text-align: center" >
                <span class="match"></span>
                <h5>Get smart responses with unique two-way matching technology</h5>
            </div><!-- /.panel-wrapper -->

            <div class="col-sm-4" style="text-align: center" >
                <span class="company"></span>
                <h5>Highlight your company as a great place to work </h5>
            </div><!-- /.panel-wrapper -->
        </div><!-- /.row -->
    </div><!-- /.panels --> 
</div>
<div class="container-fluid testmonial">
    <div class="col-sm-12" style="border: 0;    background: azure;">
        <div class="row recruit">
            <div class="col-sm-6 " style="border-right: 1px dashed #4cae4c" >
                <h2>Employee Says</h2>
                <blockquote>
                    <p>
                        "We are using Pharma Talent to great effect. We have closed 6 positions in a matter of just 2 weeks. Congratulations for creating such a wonderful product."
                        <small>Amit Singh, Co-Founder</small>
                    </p>

                </blockquote>
            </div><!-- /.panel-wrapper -->

            <div class=" col-sm-6 ">
                <h2>Success Stories</h2>
                <blockquote>
                    <p>"My experience on Pharma Talent was simply superb. Data entry was hassle-free and categorization of data modules was in a very precise manner. Keep up the good work!"</p>
                    <small><b>Rohit Bhide </b>, Network Engineer</small>
                </blockquote>
            </div><!-- /.panel-wrapper -->

        </div><!-- /.row -->
    </div><!-- /.panels --> 
</div>
<div class="cta-text">
    <div class="container">
        <div class="cta-text-inner">
            <div class="cta-text-before">I want to</div><!-- /.cta-large-before -->

            <a href="candidates.html" class="btn btn-secondary">Hire Employee</a> or <a href="positions.html" class="btn btn-secondary">Find Job</a>
        </div><!-- /.cta-text-inner -->
    </div><!-- /.container -->
</div><!-- /.cta-text -->
