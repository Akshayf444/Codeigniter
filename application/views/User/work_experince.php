<?php echo form_open('WorkExperince/work_exp') ?>
<h2 align="center">Enter Your Work Experince Details</h2>
<div class="row"><?php echo validation_errors(); ?></div>
<div class="row">
<div class="col-lg-3"></div>
        <div class="panel panel-default col-lg-6 " >
        <div class="form-group " style="text-align: center">
<!--                <h3>Enter Your Projects Detail</h3>-->
            </div>
        <div class="col-lg-12">
            
            <div class="form-group">
                <label class="control-label">Employer Name*</label>
                <input type="text" name="employer_name" required="required" class="form-control"/>

            </div>
            <div class="form-group">
                
                <input type="radio" id="one" name="employer_type" required="required" value="0" />Current Employer
                <input type="radio" id="two" name="employer_type" required="required" value="1"/>Previous Employer
                <input type="radio" id="three" name="employer_type" required="required" value="2"/>Other Employer

            </div>
            <div class="form-group">
                <label class="control-label">Duration*</label>
                <input type="date" name="from" required="required" class="form-control"/>to 
                <input type="date" name="to" required="required" class="form-control"/> 

            </div>
            <div class="form-group">
                <label class="control-label">Designation</label>
                <input type="text" name="designation" required="required" class="form-control"/>

            </div>
            <div class="form-group">
                <label class="control-label">Job Profile</label>
                <textarea class="form-control" name="job_profile">
                </textarea>
            </div>
            <div class="form-group">
                <label class="control-label notice" style="display: none" >Notice Period</label>
               
                <select style="display: none"  name="notice_period" required="required" class="form-control notice">
                    <option value="15 Days Or Less">15 Days Or Less</option>
                    <option value="1 Month">1 Month</option>
                    <option value="2 Month">2 Month</option>
                    <option value="3 Month">3 Month</option>
                    <option value="More Than 3 Month">More Than 3 Month</option>
                </select>

            </div>
            <div class="form-group">
                <input type="submit" value="Add Designation" class="btn btn-success"/>
            </div>
        </div>
        
        


    </div>
<div class="col-lg-3"></div>
</div>

</form>
<script>
    $(document).ready(function(){
        $('#one').click(function(){
            $('.notice').show();
        })
        $('#two').click(function(){
            $('.notice').hide();
        })
        $('#three').click(function(){
            $('.notice').hide();
        })
    })
</script>