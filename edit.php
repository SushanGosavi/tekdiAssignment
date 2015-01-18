<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './databaseBusiness/dbConnection.php'; 

global $uname;
global $uage;
global $ucountry;
global $uemail;
global $uphone;
global $uabout;
global $id;

if(isset($_REQUEST['uid'])){
 
    $id = $_REQUEST['uid'];
     
    $query="SELECT `uname`, DATE_FORMAT(udob,'%d-%m-%Y') as udob , `ucountry`, `uemail`, `uphone`,  `uabout` FROM `users` WHERE uid = '$id'";
  
    $retrival=  mysql_query($query);
        
        $rows = mysql_num_rows($retrival);
        $rowarr = array();
        
        if ($rows != 0) {
            $row = mysql_fetch_object($retrival);
           // print_r($row);
            
            $uname =  $row->uname ;
            $udob  =  $row->udob;
            $ucountry =  $row->ucountry;
            $uemail =  $row->uemail;
            $uphone =  $row->uphone;
            $uabout =  $row->uabout;
 
        }
        else{
            header('Location: index.php');
        }    
}
 else {
    header('Location: index.php');
}

require_once 'header.php'; 

?>

  <hr>
  
<div class="container">
    
  
    
<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" >
	<div class="panel panel-default">
	<div class="panel-body">
            <h3 class="thin text-center">Edit Details</h3>
	    <hr>

            <form class="form-horizontal" id="editForm" >

               <div class="form-group" id="inputName-div">
                  <label class="control-label col-xs-3" for="name">Name* :</label>
                  <div class="col-xs-6">
                      <input type="text" class="form-control" id="inputName" name="editName" value="<?php echo $uname;?>" placeholder="Full Name">
                  </div>
               </div>
                    
               <div class="form-group" id="inputCountry-div">
                  <label class="control-label col-xs-3" for="inputCountry">Country* :</label>
                  <div class="col-xs-6">
                       <input type="text" class="form-control" id="inputCountry" name="editCountry" value="<?php echo $ucountry;?>" placeholder="Country">
                  </div>
               </div>

               <div class="form-group checkEmail" id="inputEmail-div">
                    <label class="control-label col-xs-3" for="inputEmail">Email* :</label>
                    <div class="col-xs-6">
                      <input type="email" class="form-control" id="inputEmail" name="editEmail" value="<?php echo $uemail;?>" placeholder="Email">
                    </div>
                    <label class="control-label col-xs-3 myClass text-danger" hidden="hidden" id="email-error-1">*cannot be empty</label>
                    <label class="control-label col-xs-3 myClass text-danger" hidden="hidden" id="email-error-2">*enter valid email</label>
                    <label class="control-label col-xs-3 myClass text-danger" hidden="hidden" id="email-error-3">*email already in use</label>
               </div>
               
               <div class="form-group" id="phoneNumber-div">
                    <label class="control-label col-xs-3" for="phoneNumber">Phone* :</label>
                    <div class="col-xs-6">
                       <input type="tel" class="form-control" id="phoneNumber" maxlength="10" name="editNumber" value="<?php echo $uphone;?>" placeholder="10 Digit Phone Number" onkeypress="return isNumber(event)">
                    </div>
               </div>
               
               <div class="form-group" id="dob-div">
                 <label class="control-label col-xs-3">Date of Birth* :</label>
                 <div class="col-xs-6">
                     <input type='text'  name="editdob" id='edob' value="<?php echo $udob;?>"  placeholder="dd-mm-yyyy"/>
                 </div>
               </div>
               
               <div class="form-group" id="inputAbout-div">
                  <label class="control-label col-xs-3" for="editAbout">About Yourself* :</label>
                  <div class="col-xs-6">
                      <textarea class="form-control" id="inputAbout" name="editAbout" placeholder="Write about Yourself"> <?php echo $uabout;?></textarea>
                  </div>
               </div>     
               <hr>
               <input type="hidden" name="editId" value="<?php echo $id;?>"> 
               <div class="form-group" >
                 <div class="col-xs-offset-3 col-xs-9">
                   <input type="submit" id="editsubmit" name="submit" class="btn btn-primary" value="Update">
                   <input type="reset" class="btn btn-warning" id="addreset" value="Reset">
                   <input type="button" class="btn btn-danger" id="editCancel" value="Cancel">
                 </div>
               </div>
               
               <div class="form-group">
                   <span clear="all"/>
                   <div class="col-xs-offset-3 col-xs-9"  id="signup_status" hidden="hidden"></div>
                   <br clear="all">
               </div>
               
            </form>
           </div>             
	</div>
    </div>

</div>
<hr>
<?php 
require_once './footer.php';
?>