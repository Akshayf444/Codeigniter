<!-- /.document-title -->
<div class="container-fluid">
    <div class="col-sm-offset-1 col-sm-10">
        <div class="col-sm-12">
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="<?php echo site_url('Job/job_list'); ?>" aria-controls="Name" role="tab" data-toggle="tab">Job</a></li>
                    <li role="presentation"><a href="<?php echo site_url('Job/candidates'); ?>" aria-controls="Candidates" >Candidates</a></li>
                    <a href="<?php echo site_url('Job/add') ?>"class=" btn-sm btn-success pull-right"><b>Post Job</b></a>

                </ul>
            </div>
        </div>

        <table class="table table-striped">
            <tr>

                <th>Name</th>
                <th>Location</th>
                <th>Created</th>
                <th>Candidates</th>
                <th>Status</th>
            </tr>

            <?php foreach ($users as $user) { ?>
                <tr>
                    <td>
                        <a href="<?php echo site_url('Job/viewDetails/' . $user->job_id) ?>" style="font-weight: 800"><?php echo $user->title ?></a>

                    </td>

                    <td><?php echo $user->location ?></td>
                    <td><?php echo $user->created_at ?></td>
                    <td><?php echo $user->applied_count ?>  </td>
                    <td><select name=""><option>Open</option><option>Paused</option><option>Closed</option></select></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
