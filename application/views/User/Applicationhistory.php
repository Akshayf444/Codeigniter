<h2 class="page-header">Application History</h2>
<div class="row" style="margin-top: 30px;">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <table>
         
                <tr class=" panel panel-default"> 
                    <th style="    padding: 9px;">Job Details</th>
                    <th style="text-align: center;    padding: 9px;">Applied On</th>
                </tr>
            
                <?php foreach ($history as $application): ?>
                <tr class=" panel panel-default">
                        <td style="width: 561px;padding: 9px;">
                           
                               <a href="<?php echo site_url('User/view_search2/?id=' . $application->job_id) ?>"> <?php echo $application->title; ?></a> (<?php echo $application->exp_min?>-<?php echo $application->exp_max?> yrs.)
                           
                            <br>
                                <span><?php echo $application->name; ?></span>
                           
                         <h5><?php echo $application->location?></h5>
                        
                          
                        </td>
                        <td >
                            <?php echo date('M-d-Y',strtotime($application->created))?>
                        </td>
                    </tr>
                    
                    
                <?php endforeach; ?>
            
        </table>
    </div>
</div>