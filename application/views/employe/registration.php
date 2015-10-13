

<h2 align="center">Enter Employe Detail</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Employe/register') ?>
<div align="center">
    <label>Email</label>
    <input type="text" name="email"/>
    <label>Password</label>
    <input type="text" name="password"/>
    <label>mobile</label>
    <input type="text" name="mobile"/>
    <input type="submit" value="Register" />
    </div>
<?php echo '<pre>'; print_r($this->session->all_userdata());exit;?>
</form>