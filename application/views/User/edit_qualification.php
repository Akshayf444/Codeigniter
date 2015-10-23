<?php echo form_open('User/edit_qualification') ?>
<h2 class="page-header">Update Your Education Details</h2>
<div class="row"><?php echo validation_errors(); ?></div>
<div class="row">

    <div class="panel panel-default col-lg-6 ">
        <div class="one panel-body">
            <!--            <div class="form-group " style="text-align: center">
                            <h3>Highest Qualification</h3>
                        </div>-->
            <div class="form-group">
                <label class="control-label">Highest Qualification Held</label>
                <?php echo $dropdowns[0]; ?>

            </div>
            <div class="form-group">
                <label class="control-label">Specialization</label>
                <?php echo $dropdowns[1]; ?>
            </div>
            <div class="form-group">
                <label class="control-label">Year</label>
                <input type="text" name="year[]" class="form-control" value="<?php echo $sh['year']; ?>"/>
            </div>
            <div class="form-group">
               
                <input type="hidden" name="id" class="form-control" value="<?php echo $sh['id']; ?>"/>
            </div>
            <div class="form-group">
                <label class="control-label">Institute</label>
                <select class="form-control" name="institute[]">
                    <?php foreach ($institute as $ins): ?>
                        <option value="<?php echo $ins->id ?>"><?php echo $ins->institute ?></option>
                    <?php endforeach ?>
                </select>
            </div>



        </div>


        <div class="form-group"> 
            <input type="submit" class="btn btn-success" value="Update Qualification"/>

        </div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3"></div>

    </div>
</form>
<script><?php echo $dropdowns[2]; ?></script>
