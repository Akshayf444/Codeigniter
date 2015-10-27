<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"> Applied  Jobs List</h3>

    </div></div>
<?php foreach($user as $u):?>
<div class="col-lg-10">
    <b>Title </b> &nbsp;  <?php echo $u->title; ?>
</div>
   <div class="col-lg-10">
       <b> Name</b> &nbsp;  <?php echo $u->NAME; ?>
</div>
 <?php endforeach;
 //print_r($this->session->all_userdata());
 ?>
   