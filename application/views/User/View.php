<?php echo form_open('WorkExperince/work_exp') ?>
<div class="row">
    <h2 class="page-header">Profile Snapshot</h2>

</div>
<div class="row"><?php // echo form_open_multipart('Upload/resume');                            ?></div>
<?php //foreach ($user as $u) : ?>
<div class="row">
    <h3 align="center"><u>Basic Detail</u></h3>
    <a class="pull-right" href="../User/Add_profile">Edit</a>
    <dl></dl>
    <div class="col-lg-6">

        <dl >
            <dt><?php
            if ($user['name'] == '') {
                echo "Not Mentioned";
            } else {
                echo $user['name'];
            }
            ?></dt>
            <dt  >
            <label style="    opacity: 0.5">Resume Headline :</label><?php
            if ($user['resume_headline'] == '') {
                echo "Not Mentioned";
            } else {
                echo $user['resume_headline'];
            }
            ?>
            </dt>   
            <dt>
            <label style="    opacity: 0.5">Current Designation :</label><span><?php
                if ($user['designation'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['designation'];
                }
                ?></span>
            </dt>   
            <dt>
            <label style="    opacity: 0.5">Current Location :</label><span><?php
                if ($user['loc'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['loc'];
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Prefered Location :</label><span><?php
                if ($user['lo'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['lo'];
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Function Area :</label><span><?php
                if ($user['fun_area'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['fun_area'];
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Role :</label><span><?php
                if ($user['rol'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['rol'];
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Industry :</label><span><?php
                if ($user['industry'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['industry'];
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Date Of Birth :</label><span><?php
                if ($user['dob'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo date('M-d-Y', strtotime($user['dob']));
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Gender :</label><span><?php
                if ($user['gender'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['gender'];
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Key Skill :</label><span><?php
                if ($user['key_skill'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['key_skill'];
                }
                ?></span>
            </dt>

        </dl>
    </div>
    <div class="col-lg-6">
        <dl>
            <dt>
            <label style="    opacity: 0.5">Total Experince :</label><span><?php
                if ($user['exp_year'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['exp_year'] . "year";
                }
                ?> <?php
                if ($user['experince_month'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['experince_month'] . "month";
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Highest Qualification :</label><span><?php
                if ($user['qualification'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['qualification'];
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Mobile Number :</label><span><?php
                if ($user['mobile'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['mobile'];
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Email :</label><span><?php
                if ($user['email'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['email'];
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Permanent Address :</label><span><?php
                if ($user['address1'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['address1'];
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">City :</label><span><?php
                if ($user['city'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['city'];
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Pincode :</label><span><?php
                if ($user['pincode'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['pincode'];
                }
                ?></span>
            </dt>
            <dt>
            <label style="    opacity: 0.5">Maritial Status :</label><span><?php
                if ($user['marital_status'] == '') {
                    echo "Not Mentioned";
                } else {
                    echo $user['marital_status'];
                }
                ?></span>
            </dt>
        </dl>
    </div>
</div>


<?php //endforeach                     ?>
<hr class="page-header">
<h3 align="center"><u>Project Detail</u></h3>
<a class="pull-right" href="../User/user_projects">ADD</a>&nbsp
<?php foreach ($user2 as $u) : ?>
    <div class="row">
        <div class="col-lg-12">
            <div>

            </div>
            <div>
                <a class="pull-right" href="../User/edit_project/?id=<?php echo $u->id ?>">Edit</a>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div>

            </div>
            <div>
                <a class="pull-right" href="../User/delete_project/?id=<?php echo $u->id ?>">Delete</a>
            </div>
            
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6">
            <dl>
                <dt>
                <label style="    opacity: 0.5">Project Title :</label><span><?php echo $u->projects_title; ?></span>
                </dt>
                <dt>
                <label style="    opacity: 0.5">Client :</label><span><?php echo $u->client; ?></span>
                </dt>
                <dt>
                <label style="    opacity: 0.5">Employement Type :</label><span><?php echo $u->type; ?></span>
                </dt>
                <dt>
                <label style="    opacity: 0.5">Projects Location :</label><span><?php echo $u->location; ?></span>
                </dt>
                <dt>
                <label style="    opacity: 0.5">Role :</label><span><?php echo $u->role; ?></span>
                </dt>
                <dt>
                <label style="    opacity: 0.5">Skill Used :</label><span><?php echo $u->skill; ?></span>
                </dt>
                <dt>
                <label style="    opacity: 0.5">Role Discription :</label><span><?php echo $u->role_description; ?></span>
                </dt>
                <dt>
                <label style="    opacity: 0.5">Project Detail :</label><span><?php echo $u->detail; ?></span>
                </dt>
            </dl>
        </div>
        <div class="col-lg-6">
            <dl>
                <dt>
                <label style="    opacity: 0.5">Duration :</label><span><?php echo date('M-Y', strtotime($u->from)); ?> - <?php echo date('M-Y', strtotime($u->to)); ?></span>
                </dt>
                <dt>
                <label style="    opacity: 0.5">Sight :</label><span><?php echo $u->site; ?></span>
                </dt>
                <dt>
                <label style="    opacity: 0.5">Team Size :</label><span><?php echo $u->team_size; ?></span>
                </dt>

            </dl>
        </div>

    </div>
    <hr style="border:1px solid;    opacity: 0.2;">
<?php endforeach ?>


<hr class="page-header">
<h3 align="center"><u>Education Detail</u></h3>
<a class="pull-right" href="../User/user_qualification">ADD</a>
<?php foreach ($user3 as $u) : ?>
    <div class="row">
        <div class="col-lg-12">

            <div>
                <a class="pull-right" href="../User/edit_qualification?id=<?php echo $u->idd ?>">Edit</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div>
                <a class="pull-right" href="../User/delete_qualification?id=<?php echo $u->idd ?>">Delete</a>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-6">
            <dl>
                <dt>
                <label style="    opacity: 0.5">Qualification :</label><span><?php echo $u->qualification; ?></span>
                </dt>
                <dt>
                <label style="    opacity: 0.5">Specialization :</label><span><?php echo $u->specialization; ?></span>
                </dt>
                <dt>
                <label style="    opacity: 0.5">Institute :</label><span><?php echo $u->institute; ?></span>
                </dt>
                <dt>
                <label style="    opacity: 0.5">Year :</label><span><?php echo $u->year; ?></span>
                </dt>

            </dl>
        </div>


    </div>
    <hr style="border:1px solid;    opacity: 0.2;">
<?php endforeach ?>
</div>






