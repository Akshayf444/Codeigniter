<?php echo form_open('User/user_projects') ?>
<h2 class="page-header">Enter Your Projects Details</h2>
<div class="row"><?php echo validation_errors(); ?></div>
<div class="row">
    
    <div class="panel panel-default col-lg-12 ">
<!--        <div class="form-group " style="text-align: center">
                <h3>Enter Your Projects Detail</h3>
            </div>-->
        <div class="panel-body col-lg-6">
            
            <div class="form-group">
                <label class="control-label">Client*</label>
                <input type="text" name="client" required="required" class="form-control"/>

            </div>
            <div class="form-group">
                <label class="control-label">Projects Title*</label>
                <input type="text" name="projects_title" required="required" class="form-control"/>

            </div>
            <div class="form-group">
                <label class="control-label">Duration*</label>
                <input type="date" name="from" required="required" class="form-control"/>to 
                <input type="date" name="to" required="required" class="form-control"/> 

            </div>
            <div class="form-group">
                <label class="control-label">Location</label>
                <input type="text" name="location" required="required" class="form-control"/> 
                <input type="radio" value="onsite" name="site"/> On Site
                <input type="radio" value="offsite" name="site"/> Off Site

            </div>
            <div class="form-group">
                <label class="control-label">Emplyoment Type :</label>
                <input type="radio" value="fulltime" name="type"/> Fulltime
                <input type="radio" value="parttime" name="type"/> Part Time
                <input type="radio" value="contract" name="type"/> Contract Projects
            </div>
            
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Projects Detail *</label>
                <textarea name="detail" required="required" class="form-control">
                    
                </textarea>
            </div>
            <div class="form-group">
                <label class="control-label">Role</label>
                <select name="role" class="form-control">
                    <option>Programmer</option>
                    <option>other</option>
                </select>
            </div>

            <div class="form-group">
                <label class="control-label">Role Description</label>
                <textarea name="role_description"  class="form-control">
                    
                </textarea>
            </div>

            <div class="form-group">
                <label class="control-label">Team Size *</label>
                <select name="team_size" required="required" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                </select>
            </div>

            <div class="form-group">
                <label class="control-label">Skill Used</label>
                <input type="text" name="skill"  class="form-control">
            </div>

            <div class="form-group"> 
                <input type="submit" class="btn btn-success" value="Add Projects Detail"/>
                <input type="reset" class="btn btn-primary" value="cancle"/>

            </div>
        </div>
        

    </div>
</div>
</form>