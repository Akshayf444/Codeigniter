
<div class="document-title" style="">
    <div class="container">
        <h1 class="center">Post Job</h1>
    </div><!-- /.container -->
</div>
<div class="row">
    <div class="container " >
        <?php echo validation_errors(); ?>
        <?php echo form_open('Job/add'); ?>


        <div class="col-lg-6">
            <div class="form-group">
                <label>Job Title/Designation *</label>
                <input type="text" name="title" value="<?php echo set_value('title') ?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label>No of vacancies</label>
                <input type="text" name="no_of_vacancy" value="<?php echo set_value('no_of_vacancy') ?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Job Description *</label>
                <textarea name="description" class="form-control"/><?php echo set_value('description') ?></textarea>
            </div>
            <div class="form-group">
                <label>keywords *</label>
                <input type="text" name="keyword" value="<?php echo set_value('keyword') ?>" class="form-control"/>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>CTC *</label><br>
                <input type="text" value="<?php echo set_value('ctc_min') ?>" class="form-control half-formcontrol" placeholder="Enter Salary"  name="ctc_min">
                <select class="form-control half-formcontrol"  name="ctc_type">
                    <option value="0">Per Month</option>
                    <option value="1">Per Year</option>
                </select>
            </div>
            <div class="form-group">
                <label>Hide Salary From Jobseeker*</label>
                <input type="checkbox" name="hide_ctc" value="1">
            </div>
            <div class="form-group">
                <label>Work Experience *</label><br>
                <select class="form-control half-formcontrol"  name="exp_min"><?php echo $experience ?></select><select class="form-control half-formcontrol" name="exp_max"><?php echo $experience ?></select>
            </div>
            <div class="form-group">
                <label>Location *</label>
                <select class="form-control" name="location">
                    <?php echo $location; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Industry *</label>
                <select class="form-control" name="industry"><?php echo $industry ?></select>
            </div>
            <div class="form-group">
                <label>Function Area *</label>
                <select class="form-control" name="functional_area"><?php echo $functional_area ?></select>
                <input type="hidden" name="auth_id" value="<?php echo $auth_id ?>"/>
            </div>

        </div>
    

    <div class="form-group">
        <input type="submit" class="btn btn-primary pull-right" name="submit" value="Save" >
    </div>
</div>
</form>
</div>



<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea'});</script>
