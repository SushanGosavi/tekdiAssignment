<?php

require_once './paginationPage.php';
require_once 'header.php'; 

?>


<div class="container " id="container-auth">
    <hr>
    <ul class="list-inline">
        <li id="viewuser-btn"><a >View All</a></li>
        <li id="adduser-btn"><a >Add New</a></li>
    </ul>
    <hr>

    
    
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" id="container-adduser">
	<div class="panel panel-default">
	<div class="panel-body">
            <h3 class="thin text-center">Add New User</h3>
	    <hr>

            <form class="form-horizontal" id="addForm" >

               <div class="form-group" id="inputName-div">
                  <label class="control-label col-xs-3" for="name">Name* :</label>
                  <div class="col-xs-6">
                       <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Full Name">
                  </div>
               </div>
                    
               <div class="form-group" id="inputCountry-div">
                  <label class="control-label col-xs-3" for="inputCountry">Country* :</label>
                  <div class="col-xs-6">
                       <input type="text" class="form-control" id="inputCountry" name="inputCountry" placeholder="Country">
                  </div>
               </div>

               <div class="form-group checkEmail" id="inputEmail-div">
                    <label class="control-label col-xs-3" for="inputEmail">Email* :</label>
                    <div class="col-xs-6">
                      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
                    </div>
                    <label class="control-label col-xs-3 myClass text-danger" hidden="hidden" id="email-error-1">*cannot be empty</label>
                    <label class="control-label col-xs-3 myClass text-danger" hidden="hidden" id="email-error-2">*enter valid email</label>
                    <label class="control-label col-xs-3 myClass text-danger" hidden="hidden" id="email-error-3">*email already in use</label>
               </div>
               
               <div class="form-group" id="phoneNumber-div">
                    <label class="control-label col-xs-3" for="phoneNumber">Phone* :</label>
                    <div class="col-xs-6">
                       <input type="tel" class="form-control" id="phoneNumber" maxlength="10" name="phoneNumber" placeholder="10 Digit Phone Number" onkeypress="return isNumber(event)">
                    </div>
               </div>
               
               <div class="form-group" id="dob-div">
                 <label class="control-label col-xs-3">Date of Birth* :</label>
                 <div class="col-xs-6">
                     <input type='text'  name="dob" id='dob'  placeholder="dd-mm-yyyy"/>
                 </div>
               </div>
               
               <div class="form-group" id="inputAbout-div">
                  <label class="control-label col-xs-3" for="inputAbout">About Yourself* :</label>
                  <div class="col-xs-6">
                      <textarea class="form-control" id="inputAbout" name="inputAbout" placeholder="Write about Yourself"></textarea>
                  </div>
               </div>     
               <hr>
                
               <div class="form-group" >
                 <div class="col-xs-offset-3 col-xs-9">
                   <input type="submit" id="addsubmit" name="submit" class="btn btn-primary" value="Submit">
                   <input type="reset" class="btn btn-warning" id="addreset" value="Reset">
                 </div>
               </div>
               
               <div class="form-group">
                   <span clear="all"/>
                   <div class="col-xs-offset-3 col-xs-9"  id="signup_status" hidden="hidden"/>
                   <br clear="all"/>
               </div>
               
            </form>
           </div>             
	</div>
    </div>
    </div>
    
    <div class="col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-2" id="container-listUser"  hidden="hidden">
        <hr>
        <div>
        <div class="col-md-6"><h3>Total Users: <?php echo $nr; ?> </h3></div>
        <div class="col-md-6" ><br><div class=" pull-right"><?php echo $paginationDisplay; ?></div></div>
        </div>    
        <div class="clearfix"></div>
         <hr>
        <table class="table table-bordered" id="listuserTable">
           
            <thead >
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Country</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>About</th>
                </tr>
            </thead>  
            <tbody id="tableBody">
                <?php print "$outputList"; ?>
            </tbody>
        </table>
        
        
        
    </div>
    
    
    </div>
    
    
       
</div>        
        
<?php require_once 'footer.php'; 
    
