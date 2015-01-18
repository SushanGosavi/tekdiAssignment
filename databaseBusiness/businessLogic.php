 <?php

require_once './dbConnection.php'; 
 
error_reporting(E_ALL ^ E_NOTICE);


// *************   SIGN UP FUNCTION   ********************//

function signUpFunction(){
    
    $userName = trim(ucwords(strtolower($_POST['inputName'])));
    $userCountry = trim(ucwords(strtolower($_POST['inputCountry'])));
    $userEmail = strtolower($_POST['inputEmail']);
    $userPhone = $_POST['phoneNumber'];
    $date = $_POST['dob'];
    $userDOB = date('Y-m-d',strtotime($date));
    $uabout = trim($_POST['inputAbout']);
    
    $query="INSERT INTO `users`(`uname`, `ucountry`, `uemail`, `uphone`, `udob`, `uabout`) VALUES ('$userName', '$userCountry', '$userEmail','$userPhone','$userDOB', '$uabout')";
  
    $data=  mysql_query($query) or die("insertion unsuccessful : " . mysql_error());
    if($data){
        echo 1;
    }
    else {
        echo 0;
    }
}

//function listUserFunction(){
//    $query="SELECT `uid`, `uname`, TIMESTAMPDIFF(YEAR,udob,CURDATE()) AS uage  , `ucountry`, `uemail`, `uphone`,  `uabout` FROM `users`";
//  
//    $retrival=  mysql_query($query);
//        
//        $rows = mysql_num_rows($retrival);
//        $rowarr = array();
//        
//        if ($rows != 0) {
//            while ($row = mysql_fetch_assoc($retrival)) {
//                $rowarr[] = $row;
//            }
//            echo json_encode($rowarr);
//        }
//        else {
//            echo 0;
//        }
//}


function updateUserFunction(){
    
    $userName = trim(ucwords(strtolower($_POST['editName'])));
    $userCountry = trim(ucwords(strtolower($_POST['editCountry'])));
    $userEmail = strtolower($_POST['editEmail']);
    $userPhone = $_POST['editNumber'];
    $date = $_POST['editdob'];
    $userDOB = date('Y-m-d',strtotime($date));
    $userAbout = trim($_POST['editAbout']);
    $userId = $_POST['editId'];
    
    
    $query = "UPDATE `users` SET `uname`='$userName',`ucountry`='$userCountry',`uemail`='$userEmail',`uphone`='$userPhone',`udob`='$userDOB',`uabout`='$userAbout' WHERE `uid`= '$userId' ";
    
    $date = mysql_query($query);
    
    $updaterow = mysql_affected_rows();
    
    if($updaterow == 1){
        mysql_query("COMMIT");
        echo 1;
    }
    else {
        echo 0;
    }
    
    
}






//*********************   CONDITIONS   ********************//


if(isset($_REQUEST['inputName']) && isset($_REQUEST['inputCountry'])){
     signUpFunction();
}

else if(isset($_REQUEST['list'])){
//    listUserFunction();
}

else if (isset ($_REQUEST['editName']) && isset ($_REQUEST['editAbout']) ){
    updateUserFunction();
}

else {
    echo 'not success';
}
