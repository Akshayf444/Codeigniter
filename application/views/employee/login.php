

<h2 align="center">Login Form</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Employee/login') ?>
<div align="center">
    <label>Email</label>
    <input type="text" name="email"/>
    <label>Password</label>
    <input type="text" name="password"/>
    
    <input type="submit" value="Log In" />
    </div>
<?php echo '<pre>'; print_r($this->session->all_userdata());exit;?>
</form>