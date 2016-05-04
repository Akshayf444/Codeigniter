<div class="document-title">
    <div class="container">
        <h1 class="center"> Applied  Jobs List</h1>
    </div><!-- /.container -->
</div>
<div class="col-sm-12">
    <div class="tab">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" ><a href="<?php echo site_url('Job/job_list'); ?>" aria-controls="Name" >Job</a></li>
            <li role="presentation" class="active"><a href="<?php echo site_url('Job/candidates'); ?>" aria-controls="Candidates" >Candidates</a></li>

        </ul>
    </div>
</div>
<div class="col-sm-12">
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Current/Last Role</th>
            <th>Education</th>
            <th>Date</th>
        </tr>
   
<?php foreach ($user as $u): ?>
 <tr>
    <div class="col-lg-11 row panel panel-default">
        <div class="">
            <div class="col-lg-10">
                <b>Title </b> &nbsp;  <?php echo $u->title; ?>
            </div>
            <div class="col-lg-10">
                <a href="<?php echo site_url('Employee/User_view/?id=' . $u->user_id) ?>"><b> Name</b> &nbsp;  <?php echo $u->NAME; ?></a>
            </div>
            <div class="col-lg-10">
                <b> Email</b> &nbsp;  <?php echo $u->email; ?>
            </div>
            <div class="col-lg-10">
                <b> Mobile</b> &nbsp;  <?php echo $u->mobile; ?>
            </div>
        </div>

    </div>
    <div class="col-lg-1"></div>
    <?php
endforeach;
//print_r($this->session->all_userdata());
?>
    </table>
</div>
   