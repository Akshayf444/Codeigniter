<h2 align="center">Resume Upload</h2>
<?php echo validation_errors(); ?>
<<<<<<< HEAD
<?php echo form_open_multipart('User/resume_add') ?>
<?php
//var_dump(is_dir($_SERVER['DOCUMENT_ROOT'] . '\jobportal\assets\Resume'));
=======
<?php echo form_open_multipart('User/resume_add') 
//print_r ( $_SERVER['DOCUMENT_ROOT']);
>>>>>>> 058fb2e9032b23015bbec668d89fc33de7738e2a
?>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <lable class="control-label"></lable>
            <input type="file" name="resume" class="form-control">
        </div>
        <div class="form-group">
            <lable class="control-label">Caption</lable>
            <input type="text" name="detail" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit"  class="btn btn-success" value="Upload">
        </div>
    </div>

</div>
</form>
