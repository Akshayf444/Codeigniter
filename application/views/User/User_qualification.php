<?php echo form_open('User/user_qualification') ?>
<h2 align="center">Enter Your Education Details</h2>
<div class="row"><?php echo validation_errors(); ?></div>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="panel panel-default col-lg-6 ">
        <div class="one">
            <div class="form-group " style="text-align: center">
                <h3>Highest Qualification</h3>
            </div>
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
                <input type="text" name="year[]" class="form-control"/>
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
        <div class="second" style="display: none">
            <div class="form-group " style="text-align: center">
                <h3>Highest Qualification</h3>
            </div>
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
                <input type="text" name="year[]" class="form-control"/>
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
        <label id="add" class="pull-right add" >AddMore +</label>
            <label class="pull-right del" style="display: none">Delete -</label>
            <div class="form-group"> 
                <input type="submit" class="btn btn-success" value="Add Qualification"/>

            </div>
        <div class="col-lg-3"></div>

    </div>
</form>
<script><?php echo $dropdowns[2]; ?></script>
<script>

    $(document).ready(function () {
        $('#add').click(function () {

            //$('.one').append("<div class='second' ><hr style='border: 1px solid;'><div class='form-group' style='text-align: center'><h3>Second Highest Qualification</h3></div><div class='form-group'><label class='control-label'>Second Highest Qualification Held</label><input type='text' name='qualification' class='form-control'/></div><div class='form-group'><label class='control-label'>Specialization</label><?php echo $dropdowns[1]; ?></div><div class='form-group'><label class='control-label'>Year</label><input type='text' name='year' class='form-control'/></div><div class='form-group'><label class='control-label'>Institute</label><input type='text' name='year' class='form-control'/></div></div>");
            $('.del').show();
             $('.second').show();
            $('.add').hide();
        })
        $('.del').click(function () {

            $('.second').hides();
            $('.del').hide();
            $('.add').show();
        })

    })

</script>