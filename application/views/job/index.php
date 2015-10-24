<?php
if (isset($job)) {

    foreach ($job as $j) {
        ?>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 panel panel-default">
                <h5><a href="<?php echo site_url('Job/viewDetails/'.$j->job_id)?>"><?php echo $j->title ?></a></h5>
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

        </div>
        <?php
    }
}
?>