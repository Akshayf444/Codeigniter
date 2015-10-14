
<h2 align="center">Enter Employee Detail</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Employee/add_details') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <?php //var_dump($user_id); ?>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php
                if (isset($user['name'])) {
                    echo $user['name'];
                }
                ?>" >
            </div>
            <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" class="form-control" value="<?php
                if (isset($user['type'])) {
                    echo $user['type'];
                }
                ?>" >
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Industry Type</label>
                <input type="text" name="industry_type" class="form-control" value="<?php
                if (isset($user['industry_type'])) {
                    echo $user['industry_type'];
                }
                ?>"></div>

            <div class="form-group">
                <label>Address </label>
                <input type="text" name="address_id" class="form-control" value="<?php
                if (isset($user['address_id'])) {
                    echo $user['address_id'];
                }
                ?>">
            </div>
            <div class="form-group">
                <label>Contact Person</label>
                <input type="text" name="contact_person" class="form-control" value="<?php
                if (isset($user['contact_person'])) {
                    echo $user['contact_person'];
                }
                ?>">
            </div>


            <input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id; ?> " >


            <input type="submit" value="Register" class="btn btn-primary" />
        </div>
    </div>
</div>

</form>