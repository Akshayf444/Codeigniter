<div class="row"><?php echo validation_errors(); ?></div>
<div class="row">
    <div class="col-lg-12 ">
        <h3 class="page-header">Basic Profile</h3>
        <?php echo form_open('User/Add_profile') ?>
        <div class="panel">
            <div class="panel-body">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Name*</label><input type="text" required="required" class="form-control" placeholder="Enter Name" name="name" value="<?php
                        if (isset($user['name'])) {
                            echo $user['name'];
                        }
                        ?>" />

                    </div>
                    <div class="form-group">
                        <label class="control-label">dob*</label>
                        <input type="date"  class="form-control" required="required" name="dob" value="<?php
                        if (isset($user['dob'])) {
                            echo $user['dob'];
                        }
                        ?>"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Gender*</label>
                        <input type="radio" required="required"  name="sex" <?php
                        if (isset($user['gender']) && $user['gender'] == 'Male') {
                            echo "checked";
                        }
                        ?> value="Male"/>Male
                        <input type="radio" required="required" <?php
                        if (isset($user['gender']) && $user['gender'] == 'Female') {
                            echo "checked";
                        }
                        ?>  name="sex" value="Female "/>Female
                    </div>
                    <div class="form-group">
                        <label class="control-label">Experience*</label><br>
                        <input type="text" class="form-control half-formcontrol"  required="required" placeholder="In Years" name="experince_year" value="<?php
                        if (isset($user['exp_year'])) {
                            echo $user['exp_year'];
                        }
                        ?>"/>
                        <input type="text" class="form-control half-formcontrol"  placeholder="In Months" required="required" name="experince_month" value="<?php
                        if (isset($user['experince_month'])) {
                            echo $user['experince_month'];
                        }
                        ?>"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Current Location*</label>

                        <select class="form-control" required="required" name="current_location">
                            <?php echo $dropdowns; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Prefered Location</label>

                        <select class="form-control" required="required" name="prefred_location">
                            <?php echo $dropdowns; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Industry*</label>

                        <select class="form-control" required="required" name="industry">
                            <?php echo $industry; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Function Area</label>

                        <select class="form-control"  name="function_area">
                            <?php echo $function; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Role*</label>
                        <input type="text" class="form-control"  required="required" name="role" value="<?php

                        if (isset($user['role'])) {
                            echo $user['role'];
                        }
                        ?>"/>

                    </div>
                    <br>
                </div>

                <div class="col-lg-6" >


                    <div class="form-group">
                        <label class="control-label">Key Skills</label>
                        <input type="text" class="form-control"  name="key_skill" value="<?php

                        if (isset($user['key_skill'])) {
                            echo $user['key_skill'];
                        }
                        ?>"/>

                    </div>
                    <div class="form-group">
                        <label class="control-label">Marital Status</label>
                        <select class="form-control"  name="marital_status">
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Permanent Address</label>
                        <textarea name="address1" class="form-control"><?php

                        if (isset($user['address1'])) {
                            echo $user['address1'];
                        }
                        ?></textarea>

                    </div>
                    <div class="form-group">
                        <label class="control-label">Pincode</label>
                        <input type="text" name="pincode" class="form-control"  id="pincode"value="<?php
                        if (isset($user2['pincode'])) {
                            echo $user2['pincode'];
                        }
                        ?>">

                        <img src="../../assets/images/38-1.gif" id="img" style="display: none"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">State </label>
                        <input type="text" name="state" class="form-control" id="state" value="<?php
                        if (isset($user2['state'])) {
                            echo $user2['state'];
                        }
                        ?>">

                    </div>
                    <div class="form-group">
                        <label class="control-label">City </label>
                        <input type="text" name="city" class="form-control"  id="city" value="<?php
                        if (isset($user2['city'])) {
                            echo $user2['city'];
                        }
                        ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Resume Headline</label>
                        <input type="text" class="form-control"  name="resume_headline" value="<?php

                        if (isset($user['resume_headline'])) {
                            echo $user['resume_headline'];
                        }
                        ?>"/>

                    </div>

                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Register" />
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<script>
    jQuery(function () {

        var typingTimer; //timer identifier
        var doneTypingInterval = 1000;
        jQuery("#pincode ").keyup(function () {
            clearTimeout(typingTimer);
            if ($(this).val) {
                $(".mask").show();

                typingTimer = setTimeout(function () {
                    if ($("#pincode").val().length == 6) {

                        var search_term = $("#pincode").val();
                        var dataString = 'pincode=' + search_term;
                        sendRequest(dataString);
                    }


                }, doneTypingInterval);
            }

        });
    });
    function sendRequest(dataString) {

        var data = dataString;
        $("#img").show();
        $.ajax({
            //Send request

            type: 'get',
            data: data,
            url: '<?php echo site_url(); ?>/Employee/add_pincode',
            success: function (data) {

                var json = JSON.parse(data);
                $("#state").val(json[0].State);
                $("#city").val(json[0].District);
                $("#img").hide();

            }
        });
    }

</script>