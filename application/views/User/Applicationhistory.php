<h2 class="page-header">Application History</h2>
<div class="row">
    <div class="col-lg-6 panel panel-default">
        <table>
            <thead>
                <tr>
                    <th>Job Details</th>
                    <th>Applied On</th>
                </tr>
            </thead>
         
            
            <tbody>
                <?php foreach ($history as $application): ?>
                    <tr>
                        <td>
                            <div class="row">
                                <span><?php echo $application->title; ?></span>
                            </div>
                            <div class="row">
                                <span><?php echo $application->name; ?></span>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>