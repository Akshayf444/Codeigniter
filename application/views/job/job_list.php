<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"> View Jobs</h3>

    </div></div>
<?php foreach ($users as $user) { ?>
<div class="col-lg-10">
                    <div class="panel panel-default" >
 
                        <div class="panel-heading" >
                            <h3 class="panel-title" style="color: #0C79C3"><a href="view/<?php echo $user->job_id; ?>"><?php echo $user->title . "<br>  "; ?></a></h3>
                        </div>
                        <div class="panel-body">
                            
                                <fieldset>
                                   
                                    <div class="form-group">
                                    <b>  Keywords: </b>  <?php echo $user->keyword;?>
                                    </div>
                                    <div class="form-group">
                                     <b>  Work Experince:</b>   <?php echo $user->exp_min . " Year";
                        echo $user->exp_max . " Month";?>
                                      
                                    </div>
                                     <div class="form-group pull-right">
                                         <b>  Created: </b>     <?php
                                       echo date('d M,Y ', strtotime($user->created_at));
                        
                       
                        
                    
                    ?>
                                    </div>
                                     
                                    <!-- Change this to a button or input when using this as a form -->
                                   
                                </fieldset>
                            

                    </div>
                               </div>
                </div>
     <?php } ?>
                