<div class="document-title">
    <div class="container">
        <h1 class="center"> View Jobs</h1>
    </div><!-- /.container -->
</div><!-- /.document-title -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="positions-list">
                <?php foreach ($users as $user) { ?>
                    <div class="positions-list-item">
                        <h2 style="font-weight: 600;font-size: 16px">
                            <a href="<?php echo site_url('Job/viewDetails/' . $user->job_id) ?>"><?php echo $user->title ?></a>

                        </h2>

                        <div class="row">
                            <div class="col-sm-1" style="padding-right: 1px; ">
                                <h6><i class="fa fa-suitcase"> </i><?php echo ' ' . $user->exp_min; ?>-<?php echo $user->exp_max ?> Yrs</h6>
                            </div>
                            <div class="col-sm-5">
                                <h6><i class="fa fa-map-marker"> </i><?php echo ' ' . $user->location ?></h6>
                            </div>
                            <div class="col-sm-3">
                                <h6><i class="fa fa-inr"></i> : <?php
                                    echo $user->ctc_min;
                                    echo isset($user->ctc_type) && $user->ctc_type == 0 ? ' P.M.' : ' P.A.';
                                    ?></h6>

                            </div>
                            <div class="col-sm-3">
                                <?php  echo $user->applied_count .' People Applied';  ?>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>