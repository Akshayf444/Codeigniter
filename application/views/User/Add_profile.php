<div class="row"><?php echo validation_errors(); ?></div>
<div class="row">
    <div class="col-lg-12 ">
        <h3 class="page-header">Basic Profile</h3>
        <?php echo form_open('User/Add_profile') ?>
        <div class="panel">
            <div class="panel-body">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Name*</label><input type="text" required="required" class="form-control" placeholder="Enter Name" name="name"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">dob*</label>
                        <input type="date"  class="form-control" required="required" name="dob"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Gender*</label>
                        <input type="radio" required="required"  name="sex" value="Male"/>Male
                        <input type="radio" required="required"  name="sex" value="Female"/>Female
                    </div>
                    <div class="form-group">
                        <label class="control-label">Experience*</label><br>
                        <input type="text" class="form-control half-formcontrol"  required="required" placeholder="In Years" name="experince_year"/>
                        <input type="text" class="form-control half-formcontrol"  placeholder="In Months" required="required" name="experince_month"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Current Location*</label>
                        
                        <select class="form-control" required="required" name="current_location">
                            <?php echo $dropdowns;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Prefered Location</label>
                        
                        <select class="form-control" required="required" name="prefred_location">
                            <?php echo $dropdowns;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Industry*</label>
                        
                        <select class="form-control" required="required" name="industry">
                            <?php echo $industry;?>
                        </select>
                    </div>

                    <br>
                </div>

                <div class="col-lg-6" >

                    <div class="form-group">
                        <label class="control-label">Function Area</label>
                        
                        <select class="form-control"  name="function_area">
                            <?php echo $industry;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Role*</label>
                        <input type="text" class="form-control"  required="required" name="role"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Key Skills</label>
                        <input type="text" class="form-control"  name="key_skill"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Marital Status</label>
                        <select class="form-control"  name="marital_status">
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Resume Headline</label>
                        <input type="text" class="form-control"  name="resume_headline"/>
                    </div>

                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Register" />
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
