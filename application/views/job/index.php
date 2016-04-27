<style>
    .btn-warning {
        padding: 5px;
        border-radius: 0px;
    }
    .btn-xs{
        padding: 5px;
        border-radius: 0px;
    }
</style>

<div class="container">
    <h1 class="center">Open Positions</h1>
</div><!-- /.container -->

<div class="container">    
    <h2 class="page-header"><strong><?php echo isset($total_count) ? $total_count : 0; ?></strong> jobs matches your search criteria</h2>
    <div class="row">
        <script src="<?php echo asset_url() ?>/js/bootstrap-multiselect.js" type="text/javascript"></script>
        <link href="<?php echo asset_url() ?>/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo asset_url() ?>/js/bootstrap-typeahead.js" type="text/javascript"></script>
        <script src="<?php echo asset_url() ?>/js/jquery-migrate-1.2.1.js" type="text/javascript"></script>

        <?php
        $attribute = array('method' => 'get');
        echo form_open('Job/filter', $attribute);
        ?>
        <div class="col-sm-3 hidden-xs">
            <div class="filter-stacked">
                <form method="post" action="#">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Keyword">
                    </div>

                    <h3>Salary <a href="#"><i class="fa fa-close"></i></a></h3>

                    <div class="split-forms">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Min.">
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Max.">
                        </div>
                    </div>

                    <h3>Contract <a href="#"><i class="fa fa-close"></i></a></h3>

                    <div class="checkbox">
                        <label><input type="checkbox"> Full-time</label>
                    </div><!-- /.checkbox -->

                    <div class="checkbox">
                        <label><input type="checkbox"> Part-time</label>
                    </div><!-- /.checkbox -->

                    <div class="checkbox">
                        <label><input type="checkbox"> One-time project</label>
                    </div><!-- /.checkbox -->

                    <a href="#" class="filter-stacked-show-more">Show More ...</a>

                    <h3>Location <a href="#"><i class="fa fa-close"></i></a></h3>

                    <div class="checkbox">
                        <label><input type="radio" name="radio-test" value="1"> San Francisco</label>
                    </div><!-- /.checkbox -->

                    <div class="checkbox">
                        <label><input type="radio" name="radio-test" value="2"> Sacramento</label>
                    </div><!-- /.checkbox -->

                    <div class="checkbox">
                        <label><input type="radio" name="radio-test" value="3"> Los Angeles</label>
                    </div><!-- /.checkbox -->

                    <a href="#" class="filter-stacked-show-more">Show More ...</a>

                    <h3>Status <a href="#"><i class="fa fa-close"></i></a></h3>

                    <div class="checkbox">
                        <label><input type="checkbox"> Most Recent</label>
                    </div><!-- /.checkbox -->

                    <div class="checkbox">
                        <label><input type="checkbox"> Featured</label>
                    </div><!-- /.checkbox -->

                    <div class="checkbox">
                        <label><input type="checkbox"> Urgent</label>
                    </div><!-- /.checkbox -->

                    <a href="#" class="filter-stacked-show-more">Show More ...</a>

                    <button type="submit" class="btn btn-secondary btn-block"><i class="fa fa-refresh"></i> Reset Filter</button>
                </form>
            </div><!-- /.filter-stacked -->

        </div><!-- /.col-* -->

        <div class="col-sm-9">
            <div class="positions-list">
                <?php
                if (isset($job)) {

                    foreach ($job as $j) {
                        ?>
                        <div class="positions-list-item">
                            <h2 style="font-weight: 600;font-size: 16px">
                                <a href="<?php echo site_url('Job/viewDetails/' . $j->job_id) ?>"><?php echo $j->title ?></a>
                                <small class="pull-right"><a href="<?php echo site_url('Job/apply/' . $j->job_id) . '?redirect_url=' . current_url() . '?skill=' . $_GET['skill'] . '&location=' . $_GET['location']; ?><?php //echo $j->link;     ?>" class="btn btn-warning"><?php echo (int) $j->applied_status == 1 ? 'Applied' : 'Apply' ?></a></small>
                            </h2>
                            <p style="color: #777;font-size: 14px"><?php echo $j->name ?></p>
                            <div class="row">
                                <div class="col-sm-2" style="padding-right: 1px; ">
                                    <h6><i class="fa fa-suitcase"> </i><?php echo ' ' . $j->exp_min; ?>-<?php echo $j->exp_max ?> Yrs</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h6><i class="fa fa-map-marker"> </i><?php echo ' ' . $j->location ?></h6>
                                </div>
                                <div class="col-sm-3">
                                    <h6><i class="fa fa-inr"></i> : <?php
                                        if ($j->hide_ctc == 1) {
                                            echo $j->ctc_min;
                                            echo isset($j->ctc_type) && $j->ctc_type == 0 ? ' P.M.' : ' P.A.';
                                        } else {
                                            echo 'Not to be disclosed';
                                        }
                                        ?></h6>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p style="color: #717171"><?php echo $j->description ?></p>
                                    <h6><b>Key Skills : </b><?php echo $j->keyword ?><small class="pull-right"><?php echo date('d-m-Y', strtotime($j->posted_at)) ?></small></h6>
                                </div>
                            </div>

                            <!--                        <div class="position-list-item-date">10/11/2015</div> /.position-list-item-date 
                                                    <div class="position-list-item-action"><a href="#">Save Position</a></div> /.position-list-item-action -->
                        </div><!-- /.position-list-item -->
                        <?php
                    }
                }
                ?>
                <?php
                if (isset($total_pages)) {
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if (isset($page) && $page == $i) {
                            echo '<a href="' . site_url('Job/search/' . $i) . '?skill=' . $_GET['skill'] . '&location=' . $_GET['location'] . '" class="active btn btn-xs">' . $i . '</a>';
                        } else {
                            echo '<a href="' . site_url('Job/search/' . $i) . '?skill=' . $_GET['skill'] . '&location=' . $_GET['location'] . '" class="btn btn-xs">' . $i . '</a>';
                        }
                    }
                }
                ?>
            </div>
        </div>
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