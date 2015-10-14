<?php echo form_open('User/profile_update') ?>
<h2 align="center">Enter Your Education Details</h2>
<div class="row"><?php echo validation_errors(); ?></div>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="panel panel-default col-lg-6">
        <div class="form-group" style="text-align: center">
            <h3>Highest Qualification</h3>
        </div>
        <div class="form-group">
            <label class="control-label">Highest Qualification Held</label>
            <select class="form-control" name="qualification"/>
            <?php foreach ($edu as $edu_spl): ?>
            <option value="<?php echo $edu_spl->edu_id?>"><?php echo $edu_spl->qualification; ?></option>
            <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Specialization</label>
            <input type="text" name="specialization" class="form-control"/>
        </div>
        <div class="form-group">
            <label class="control-label">Year</label>
            <input type="text" name="year" class="form-control"/>
        </div>
        <div class="form-group">
            <label class="control-label">Institute</label>
            <input type="text" name="year" class="form-control"/>
        </div>
        <div class="second" style="display: none">
            <hr style="border: 1px solid;">

            <div class="form-group" style="text-align: center">
                <h3>Second Highest Qualification</h3>
            </div>
            <div class="form-group">
                <label class="control-label">Second Highest Qualification Held</label>
                <input type="text" name="qualification" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Specialization</label>
                <input type="text" name="specialization" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Year</label>
                <input type="text" name="year" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Institute</label>
                <input type="text" name="year" class="form-control"/>
            </div>
        </div>
        <label class="pull-right add">AddMore +</label>
        <label class="pull-right del" style="display: none">Delete -</label>
        <input type="submit" class="btn btn-success" value="Add Qualification"/>
    </div>
    <div class="col-lg-3"></div>

</div>
</form>
<script type="javascript/text">
    $(document).ready(function(){
    $('.add').click(function(){
    alert();
    $('.del').show();
    })
    })
</script>