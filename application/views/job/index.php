
<div class="row">
    <script src="<?php echo asset_url() ?>/js/bootstrap-multiselect.js" type="text/javascript"></script>
    <link href="<?php echo asset_url() ?>/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css"/>


    <div class="col-lg-2">

        <div class="row">
            <select class="form-control multiselect " multiple="multiple">
                <?php
                foreach ($dropdowns as $drop) :
                    // var_dump($drop);
                    ?>
                    <option><?php echo $drop->location; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row">
            <select class="form-control multiselect " multiple="multiple">
                <?php
                foreach ($industry as $indus) :
                    // var_dump($drop);
                    ?>
                    <option><?php echo $indus->industry; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>


    <div class="col-lg-1"></div>
    <?php
    if (isset($job)) {

        foreach ($job as $j) {
            ?>

            <div class="col-lg-8 panel panel-default">
                <h5><a href="<?php echo site_url('Job/viewDetails/' . $j->job_id) ?>"><?php echo $j->title ?></a></h5>
                <h6><?php echo $j->name ?></h6>
                <div class="row">
                    <dl>
                        <dt class="col-sm-1">
                        <h6><?php echo $j->exp_min ?>-<?php echo $j->exp_max ?>Yrs</h6>
                        </dt>
                        <dt class="col-sm-2">
                        <h6><?php echo $j->loc ?></h6>
                        </dt>
                        <dt class="col-sm-2">
                        <h6>Key Skills :</h6>
                        </dt>
                        <dt class="col-sm-2">
                        <h6><?php echo $j->keyword ?></h6>
                        </dt>
                    </dl>
                </div>

                <div class="row">
                    <dl>
                        <dt class="col-sm-1">
                        <h6>RS</h6>
                        </dt>
                        <dt class="col-sm-2">
                        <h6><?php echo $j->ctc_min ?> P.A</h6>
                        </dt>
                    </dl>
                </div>
            </div>


            <?php
        }
    }
    ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $('.multiselect').multiselect({
            numberDisplayed: 1
        });

    });
</script>