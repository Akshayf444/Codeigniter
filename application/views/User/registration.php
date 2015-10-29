
<div class="panel panel-default" style="width: 197px;
     margin: 0px 0px 0px 456px;
     border-radius: 30px 30px 0px 0px;">
    <h2 align="center">Registration</h2>
</div>
<?php echo validation_errors(); ?>

<?php echo form_open('User/register') ?>
<div class="row">
    <div class="panel panel-default" style="    padding: 17px;">

        <div class="row">

            <div class="col-lg-3">
                <div class="form-group">
                    <h4 >Create Login Detail</h4>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="form-group">
                    <lable class="control-label">Email*</lable>
                    <input type="text" required="required" class="form-control" name="email"/>
                </div>
                <div class="form-group">
                    <lable class="control-label">Password*</lable>
                    <input type="text" required="required" class="form-control" name="password"/>
                </div>
                <div class="form-group">
                    <lable class="control-label">mobile*</lable>
                    <input type="text" required="required" class="form-control" name="mobile"/>

                </div>

            </div>
            <div class="col-lg-3"></div>
        </div>
        <hr class="page-header">
        <div class="row" style="padding-top: 14px;">

            <div class="col-lg-3">
                <div class="form-group">
                    <h4 >Basic Detail</h4>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <lable class="control-label">Your Full Name*</lable>
                    <input type="text" required="required" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <lable class="control-label">Where You Are Currently Located*</lable>
                    <select class="form-control" name="current_location">
                        <?php echo $location; ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <hr class="page-header">
        <div class="row" style="padding-top: 14px;">

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
                    <select class="form-control" name="institute[]">
                        <?php echo $institute; ?>
                    </select>
                </div>
                <div class="form-group">
                    <lable class="control-label">Year</lable>
                    <input type="text" class="form-control" name="year[]"/>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <hr class="page-header">
        <div class="row" style="padding-top: 14px;">

            <div class="col-lg-3">
                <div class="form-group">
                    <h4 >Work Experince</h4>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="form-group">
                    <lable class="control-label">In Years</lable>
                    <input type="text" class="form-control" name="experince_year"/>
                </div>
                <div class="form-group">
                    <lable class="control-label">In Month</lable>
                    <input type="text" class="form-control" name="experince_month"/>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <input type="submit" class="btn btn-success pull-right" align="center" value="Register" />
            </div>
        </div>
    </div>
</div>
</form>