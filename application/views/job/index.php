<?php
if (isset($job)) {

    foreach ($job as $j) {
        ?>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 panel panel-default">
                <h4><a href="<?php echo site_url('Job/viewDetails/' . $j->job_id) ?>"><?php echo $j->title ?></a></h4>
                <h5><?php echo $j->name ?></h5>
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
            </div>

        </div>
        <?php
    }
}
?>