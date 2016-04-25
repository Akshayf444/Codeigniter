<div class="document-title">
    <div class="container">
        <h1 class="center">Login</h1>
    </div><!-- /.container -->
</div><!-- /.document-title -->
<h3 style="color:red;"><?php
    if (isset($user)) {
        echo $user;
    }
    ?></h3>
<?php echo validation_errors(); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"  >
                    <a href="<?php echo site_url('User/login'); ?>" aria-controls="personal" role="tab" data-toggle="tab">
                        <strong>Personal Account</strong>

                    </a>
                </li>

                <li role="presentation" class="active">
                    <a href="<?php echo site_url('Employee/login'); ?>" aria-controls="company" role="tab" data-toggle="tab">
                        <strong>Company Account</strong>
                   
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <?php echo form_open('Employee/login') ?>
                <div role="tabpanel" class="tab-pane active" id="company">
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

                    <div class="col-sm-12">
                        <div class="pull-left">
                            <button type="submit" class="btn btn-secondary">Login</button>
                            <a href="<?php echo site_url('Employee/register') ?>">Click Here To Register</a>
                        </div><!-- /.center -->
                    </div>
                </div><!-- /.tab-content -->
                </form>
            </div><!-- /.col-* -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>