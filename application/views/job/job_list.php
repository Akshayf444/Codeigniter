<div class="document-title">
    <div class="container">
        <h1 class="center"> View Jobs</h1>
    </div><!-- /.container -->
</div><!-- /.document-title -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
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
                            <a href="<?php echo site_url('Job/viewDetails/' . $user->job_id) ?>"><?php echo $user->title ?></a>

                        </td>

                        <td><?php $user->location ?></td>
                        <td><?php $user->created_at ?></td>
                        <td><?php echo $user->applied_count ?>  </td>
                        <td><select name=""><option>Open</option><option>Paused</option><option>Closed</option></select></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>