<div class="document-title">
    <div class="container">
        <h1 class="center">Account Registration</h1>
    </div><!-- /.container -->
</div><!-- /.document-title -->

<?php echo validation_errors(); ?>

<?php echo form_open('Employee/register') ?>
<?php
if (isset($error)) {
    echo "<h4>" . $error . "</h4>";
}
?>
<?php
if (isset($Error)) {
    echo "<h4>" . $Error . "</h4>";
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" >
                    <a href="<?php echo site_url('User/register'); ?>" aria-controls="personal" role="tab" data-toggle="tab">
                        <strong>Personal Account</strong>
                        <span>I'm looking for a job</span>
                    </a>
                </li>

                <li role="presentation" class="active">
                    <a href="<?php echo site_url('Employee/register'); ?>" aria-controls="company" role="tab" data-toggle="tab">
                        <strong>Company Account</strong>
                        <span>We are hiring employees</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <?php echo form_open('Employee/register') ?>
                <div role="tabpanel" class="tab-pane active" id="company">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label >E-mail</label>
                                <input type="text" required="required" class="form-control" name="email"/>
                            </div><!-- /.form-group -->

                            <div class="form-group col-sm-6" >
                                <label >Password</label>
                                <input type="text" required="required" class="form-control" name="password"/>
                            </div><!-- /.form-group -->

                            <div class="form-group col-sm-6">
                                <label >Mobile</label>
                                <input type="text" required="required" maxlength="11" class="form-control" name="mobile"/>
                            </div><!-- /.form-group -->

                        </div><!-- /.col-* -->
                    </div><!-- /.row -->

                    <div class="center">
                        <div class="checkbox checkbox-info">
                            <label><input type="checkbox"> By signing up, you agree with the <a href="#">terms and conditions</a></label>
                        </div><!-- /.checkbox -->

                        <button type="submit" class="btn btn-secondary">Create an Account</button>
                    </div><!-- /.center -->
                </div><!-- /.tab-pane -->
                </form>
            </div><!-- /.tab-content -->
        </div><!-- /.col-* -->
    </div><!-- /.row -->
</div><!-- /.container -->
</form>