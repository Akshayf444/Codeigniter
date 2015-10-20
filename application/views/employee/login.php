<div class="row">
    <div class="col-lg-4 col-lg-offset-8 panel signin">
        <h3 class="page-header">Sign In</h3>
        <h3 style="color:red;"><?php
            if (isset($user)) {
                echo $user;
            }
            ?></h3>
        <?php echo validation_errors(); ?>

        <?php echo form_open('Employee/login') ?>

        <div class="form-group">
            <label class="control-label">Email</label>
            <input type="text" class="form-control input-lg" name="email"/>
        </div>
        <div class="form-group">
            <label class="control-label">Password</label>
            <input type="text" class="form-control input-lg" name="password"/>
        </div>
        <input type="submit" class="btn btn-info btn-lg" value="Log In" />

        </form>
    </div>
</div>