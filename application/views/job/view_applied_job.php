<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"> Applied  Jobs List</h3>

    </div></div>
<?php foreach ($user as $u): ?>
    <div class="col-lg-11 row panel panel-default">
        <div class="">
            <div class="col-lg-10">
                <b>Title </b> &nbsp;  <?php echo $u->title; ?>
            </div>
            <div class="col-lg-10">
                <a href="<?php echo site_url('Employee/User_view/?id=' . $u->user_id) ?>"><b> Name</b> &nbsp;  <?php echo $u->NAME; ?><?php echo $u->user_id; ?></a>
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
   