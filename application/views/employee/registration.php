

<h2 align="center">Employee Registration</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Employee/register') ?>
<?php 
if(isset($error))
{
    echo "<h4>".$error."</h4>";
}
?>
<?php 
if(isset($Error))
{
    echo "<h4>".$Error."</h4>";
}
?>

<div  classs="row">
    <div class="col-lg-3"></div>
    <div align="center" class="col-lg-6 panel panel-default">
        <div class="form-group">
            <label class="control-label">Email</label>
            <input type="text" class="form-control" name="email"/>
        </div>
        <div class="form-group">
            <label class="control-label">Password</label>
            <input type="text" class="form-control" name="password"/>
        </div>
        <div class="form-group">
            <label class="control-label">mobile</label>
            <input type="text" class="form-control" name="mobile"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Register" />
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>

</form>