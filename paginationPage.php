<?php
require_once './databaseBusiness/dbConnection.php';


$query="SELECT `uid`, `uname`, TIMESTAMPDIFF(YEAR,udob,CURDATE()) AS uage  , `ucountry`, `uemail`, `uphone`,  `uabout` FROM `users` ORDER BY uid ASC";
$sql = mysql_query($query);


$nr = mysql_num_rows($sql);                           // Get total of Num rows from the database query
if (isset($_GET['pn'])) {                             // Get pn from URL vars if  it is present
    $pn = preg_replace('#[^0-9]#i', '', $_GET['pn']); // filter everything but numbers for security(new)
} else {                                              // If the pn URL variable is not present force it to be value of page number 1
    $pn = 1;
} 
//set how many database items to show on each page 
$itemsPerPage = 3; 
//last page in the pagination result set
$lastPage = ceil($nr / $itemsPerPage);
// Be sure URL variable $pn(page number) is no lower than page 1 and no higher than $lastpage
if ($pn < 1) {                              // If it is less than 1
    $pn = 1;                                // force if to be 1
} else if ($pn > $lastPage) {               // if it is greater than $lastpage
    $pn = $lastPage;                        // force it to be $lastpage's value
} 

// creates the numbers to click in between the next and back buttons
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
} else if ($pn == $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
}
//sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 
//query as above but with $limit onto the end of the SQL syntax
// $sql2 is what we will use to fuel our while loop statement below
$query2="SELECT `uid`, `uname`, DATE_FORMAT(udob,'%d-%m-%Y') AS uage  , `ucountry`, `uemail`, `uphone`,  `uabout` FROM `users` ORDER BY uid ASC $limit";
$sql2 = mysql_query($query2); 

$paginationDisplay = ""; // Initialize the pagination output variable
// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display
if ($lastPage != "1"){
    // This shows the user what page they are on, and the total number of pages
    $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
    // If we are not on page 1 we can place the Back button
    if ($pn != 1) {
        $previous = $pn - 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> Back</a> ';
    } 
    // Lay in the clickable numbers display here between the Back and Next links
    $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
    // If we are not on the very last page we can place the Next button
    if ($pn != $lastPage) {
        $nextPage = $pn + 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage . '"> Next</a> ';
    } 
}

// Build the Output Section Here
$outputList = '';
while($row = mysql_fetch_array($sql2)){ 

    $uid = $row["uid"];
    //$firstname = $row["firstname"];
    $uname = $row["uname"];
    $udob = $row["uage"];
    $ucountry = $row["ucountry"];
    $uemail = $row["uemail"];
    $uphone = $row["uphone"];
    $uabout = $row["uabout"];

    $outputList .= '<tr><td>' . $uname . '</td><td>' . $udob . ' </td><td> ' . $ucountry . '</td><td>' . $uemail . '</td><td>' . $uphone . '</td><td>' . $uabout . '</td> <td>   <a href="edit.php?uid=' . $uid . '">Edit </a> </td>  </tr> ';
    
} // close while loop

?>