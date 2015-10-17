<?php echo form_open('WorkExperince/work_exp') ?>
<h2 align="center">Profile Snapshot</h2>
<div class="row"><?php // echo form_open_multipart('Upload/resume');  ?></div>
<div class="row">
    <div class="col-lg-6">
        <?php foreach ($user as $u) : ?>
            <h4><?php echo $u->name; ?></h4>
            <div  >
                <label style="    opacity: 0.5">Resume Headline :</label><span><?php echo $u->resume_headline; ?></span>
            </div>   
            <div class="col-sm-6">
                <label style="    opacity: 0.5">Current Designation :</label><span><?php echo $u->designation; ?></span>
                </div>   
            <div class="col-sm-6">
                <label style="    opacity: 0.5">Total Experince :</label><span><?php echo $u->exp_year."year"; ?> <?php echo $u->experince_month."month"; ?></span>
                </div>
            </div>    
        <?php endforeach ?>
    </div>
</div>