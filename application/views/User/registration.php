

<!--<h2 align="center">Enter User Detail</h2>-->

<?php echo validation_errors(); ?>

<?php echo form_open('User/register') ?>
<div class="row">
    <div class="row">

        <div class="col-lg-3">
            <div class="form-group">
                <h4 >Create Login Detail</h4>
            </div>
        </div>
        <div class="col-lg-6">

            <div class="form-group">
                <lable class="control-label">Email</lable>
                <input type="text" class="form-control" name="email"/>
            </div>
            <div class="form-group">
                <lable class="control-label">Password</lable>
                <input type="text" class="form-control" name="password"/>
            </div>
            <div class="form-group">
                <lable class="control-label">mobile</lable>
                <input type="text" class="form-control" name="mobile"/>

            </div>

        </div>
        <div class="col-lg-3"></div>
    </div>
    <hr class="page-header">
    <div class="row">

        <div class="col-lg-3">
            <div class="form-group">
                <h4 >Basic Detail</h4>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable class="control-label">Your Full Name</lable>
                <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">
                <lable class="control-label">Where You Are Currently Located</lable>
                <input type="text" class="form-control" name="current_location"/>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <hr class="page-header">
    <div class="row">

        <div class="col-lg-3">
            <div class="form-group">
                <h4 >Education Detail</h4>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable class="control-label">Qualification</lable>
                <?php echo $dropdowns[0]; ?>

            </div>
            <div class="form-group">
                <lable class="control-label">Specialization</lable>
                <?php echo $dropdowns[1]; ?>
            </div>
            <div class="form-group">
                <lable class="control-label">Institute</lable>
                <input type="text" class="form-control" name="institute"/>
            </div>
            <div class="form-group">
                <lable class="control-label">Year</lable>
                <input type="text" class="form-control" name="year"/>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <input type="submit" class="btn btn-success" value="Register" />
</div>
</form>