


<?php echo form_open('User/Add_profile') ?>

<h2 align="center">Enter User Detail</h2>

<div class="row"><?php echo validation_errors(); ?></div>
<div class="row" align="center">

    <div class="col-lg-5  panel panel-default" style="    padding-top: 24px;" >
        <div class="form-group">
            <label class="col-sm-2 control-label">Name*</label><input type="text" style="width: 300px" required="required" class="form-control" placeholder="Enter Name" name="name"/>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">dob*</label>
            <input type="date" style="width: 300px" class="form-control" required="required" name="dob"/>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Gender*</label>
            <input type="radio" required="required"  name="sex" value="Male"/>Male
            <input type="radio" required="required"  name="sex" value="Female"/>Female
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Experince*</label>
            <input type="text" class="form-control" style="width: 100px;float:left" required="required" placeholder="In Years" name="experince_year"/>
            <input type="text" class="form-control" style="width: 100px" placeholder="In Months" required="required" name="experince_month"/>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Current Location*</label>
            <input type="text" class="form-control" style="width: 300px" placeholder="Enter Current Location" required="required" name="current_location"/>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Prefered Location</label>
            <input type="text" class="form-control" style="width: 300px" placeholder="Enter Prefred Location" name="prefred_location"/>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Industry*</label>
            <input type="text" style="width: 300px" placeholder="Enter industries" required="required" class="form-control" name="industry"/>
        </div>

        <br>
    </div>

    <div class="col-lg-6 col-lg-offset-1 panel panel-default" style="    padding-top: 24px;" >

        <div class="form-group">
            <label class="col-sm-2 control-label">Function Area</label>
            <input type="text" class="form-control" style="width: 300px" name="function_area"/>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Role*</label>
            <input type="text" class="form-control" style="width: 300px" required="required" name="role"/>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Key Skills</label>
            <input type="text" class="form-control" style="width: 300px" name="key_skill"/>
        </div>
        <div class="form-group">
            <!--    <label>Experince</label>
                <input type="text" class="form-control" name="exp_year"/>-->
            <label class="col-sm-2 control-label">Marital Status</label>
            <select class="form-control" style="width: 300px" name="marital_status">
                <option value="single">Single</option>
                <option value="married">Married</option>
            </select>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Resume Headline</label>
            <input type="text" class="form-control" style="width: 300px" name="resume_headline"/>
        </div>

        <br>
        <input type="submit" class="btn btn-success" value="Register" />
        <br><br><br><br>
    </div>
</div>

</form>