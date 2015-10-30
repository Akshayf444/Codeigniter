<div class="row">
    <script src="<?php echo asset_url() ?>/js/bootstrap-multiselect.js" type="text/javascript"></script>
    <link href="<?php echo asset_url() ?>/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo asset_url() ?>/js/bootstrap-typeahead.js" type="text/javascript"></script>
    <script src="<?php echo asset_url() ?>/js/jquery-migrate-1.2.1.js" type="text/javascript"></script>
    <div class="col-lg-2 panel panel-default">
        <?php
        $attribute = array('method' => 'get');
        echo form_open('Job/filter', $attribute);
        ?>
        <label>Select Location</label>
        <select  class="form-control multiselect" name="location[]" multiple="multiple" >
                <option value="Mumbai">Mumbai</option>
                <option value="Delhi">Delhi</option>
                <option value="Pune">Pune</option>
                <option value="Bengaluru / Bangalore">Bengaluru / Bangalore</option>
                <option value="Chandigarh">Chandigarh</option>
            </select>
 
<br>
<label>Select Industry</label>
            <input type="text" name="industry" class="form-control city1" style="width: 133px;" id="city1" autocomplete="off" data-provide="typeahead" placeholder="industry"/> 
            

     <br>   
     <input type="submit"  class="btn btn-success" value="search"/>
    </div> 

    <div class="col-lg-1"></div>

    <div class="col-lg-8 panel panel-default">
        <?php
        if (isset($job)) {

            foreach ($job as $j) {
                ?>

                <h5><a href="<?php echo site_url('Job/viewDetails/' . $j->job_id) ?>"><?php echo $j->title ?></a></h5>
                <h6><?php echo $j->name ?></h6>

                <div class="row">
                    <dl>
                        <dt class="col-sm-2">
                        <h6><i class="fa fa-suitcase"> </i><?php echo ' ' . $j->exp_min; ?>-<?php echo $j->exp_max ?> Yrs</h6>
                        </dt>
                        <dt class="col-sm-2">
                        <h6><i class="fa fa-map-marker"> </i><?php echo ' ' . $j->loc ?></h6>
                        </dt>
                        <dt class="col-sm-8">
                        <h6>Key Skills : <?php echo $j->keyword ?></h6>
                        </dt>
                    </dl>
                </div>

                <div class="row">
                    <dl>
                        <dt class="col-sm-1">
                        <h6><i class="fa fa-inr"></i></h6>
                        </dt>
                        <dt class="col-sm-2">
                        <h6><?php
                            if ($j->hide_ctc == 1) {
                                echo $j->ctc_min;
                                echo isset($j->ctc_type) && $j->ctc_type == 0 ? ' P.M.' : ' P.A.';
                            } else {
                                echo 'Not to be disclosed';
                            }
                            ?>
                        </h6>
                        </dt>
                    </dl>
                </div>
                <hr class="page-header">
                <?php
            }
        }
        ?>
    </div>



</div>


<script type="text/javascript">
    $(document).ready(function () {

        $('.multiselect').multiselect({
            numberDisplayed: 1
        });

    });

    $('#city1').typeahead({
        source: function (typeahead, query) {
            var industry = $('#city1').val();
          
//            $(".loader").show();
            $.ajax({
                url: 'indus',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    industry: industry,
                   
                },
                success: function (data) {
                    console.log(data);
                    typeahead.process(data);
                    
                }
            });
        }
    });
   


</script>