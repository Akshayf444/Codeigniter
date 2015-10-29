<h2 class="page-header">Change Password</h2>
<div class="row"><?php echo validation_errors(); ?></div>
<!--<div class="row" style="margin-top: 15px;">-->
<?php 
if(isset($error))
{
?>
<h3><?php echo $error;?></h3>
<?php 
}
?>
<?php echo form_open('Employee/changepassword') ?>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 panel panel-default" style="margin-top: 28px;" >
        <div class="form-group" style="margin-top: 28px;">
            <input type="text" class="form-control" name="old_password" placeholder="Enter New Password"/>
        </div>
        <div class="form-group" style="margin-top: 28px;">
            <input type="text" class="form-control" name="password" placeholder="Enter New Password"/>
        </div>
        <div align="center" class="col-sm-12 form-group">
            <input type="submit" class="btn btn-success" value="change password"/>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
</form>