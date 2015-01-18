/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
   
   $("#edob").Zebra_DatePicker({
       view: 'years',
       format: 'd-m-Y',
       direction : -1
   });
    
    
    $( "#addForm" )[0].reset(); 
   
   $("#addForm #dob").Zebra_DatePicker({
       view: 'years',
       format: 'd-m-Y',
       direction : -1
   });
   
   $('#container-adduser').hide();
    $('#container-listUser').show();
   // ajaxView();
   

});


function ajaxView(){
    $.ajax({
       url : 'databaseBusiness/businessLogic.php',
       type : 'POST',
       data : { list : 1 } ,
       dataType: 'json',
       beforeSend: function(){
          $('#container-listUser').show(300);
          $('#container-adduser').hide(100); 
          $("#tableBody tr").remove();
       },
       success: function(responce) {
         if(responce === 0){
                alert("no user registered)");
               }
            else{
                $.each(responce, function (i,d){
                    $('#tableBody').append('<tr><td>' + d.uname + '</td><td>' + d.uage + ' </td><td> ' + d.ucountry + '</td><td>' + d.uemail + '</td><td>' + d.uphone +'</td><td>' + d.uabout +'</td> <td>   <a href="edit.php?uid=' + d.uid +'">Edit</a>         </td>  </tr>   ');
                });
            }   
       }
   });
}




$('#adduser-btn').click(function(event){
   event.preventDefault();
    //alert("clicked add User");
    $('#container-adduser').show(300);
    $('#container-listUser').hide(100);
});

$('#viewuser-btn').click(function(event){
   event.preventDefault();
   //alert("clicked view User");
    $('#container-adduser').hide(100);
    $('#container-listUser').show(300);
   // ajaxView();
       
});








//*******************   function to check phone input type   ******** /

function isNumber(evt) {
   evt = (evt) ? evt : window.event;
   var charCode = (evt.which) ? evt.which : evt.keyCode;
   if (charCode > 31 && (charCode < 48 || charCode > 57)) {
       alert("enter digits of phone numbers");    
       return false;
   }
   return true;
}


//************************* Reset Form *****************************//

$("#addreset").click(function (event){
    event.preventDefault();
    $( "#addForm" ).each(function(){
        this.reset();
    });
    $("#inputEmail-div").removeClass('has-error');
    $("#email-error-1").hide();
    $("#email-error-2").hide();
    $("#email-error-3").hide();
    $('#addsubmit').removeAttr('disabled'); 
    $("#signup_status").hide(500);
});


//*****************  Registration email validate     ***************************

$('input[name="inputEmail"]').blur(function(){
  var emails = $("#inputEmail").val();
  var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    
        if(emails == ""){
                $("#email-error-2").hide();
                $("#email-error-3").hide();
		$("#email-error-1").show();
		//$("#inputEmail").focus();
                $("#inputEmail-div").addClass('has-error');
                $('#addsubmit').attr('disabled','disabled');
                $('#editsubmit').attr('disabled','disabled');
                
	}
	else if(reg.test(emails) == false){
		$("#email-error-2").show();
                $("#email-error-1").hide();
                $("#email-error-3").hide();
		//$("#inputEmail").focus();
                $("#inputEmail-div").addClass('has-error');
                $('#addsubmit').attr('disabled','disabled');
                $('#editsubmit').attr('disabled','disabled');
	}
        else{
                $("#email-error-2").hide();
                $("#email-error-1").hide();
                $("#email-error-3").hide();
                $("#inputEmail-div").removeClass('has-error');
                $('#addsubmit').removeAttr('disabled');
                $('#editsubmit').removeAttr('disabled');
            }
});





//**************   Registration Form Validate and Submit    ************

$('#addsubmit').click(function(event){
        event.preventDefault();
    //  alert('clicked submit');
        var userName = $("#inputName").val();
	var userCountry = $("#inputCountry").val();
	var emails = $("#inputEmail").val();
	var phone = $("#phoneNumber").val();
        var dob = $("#dob").val();
        var about = $("#inputAbout").val();
              
	if(userName == ""){
                $("#signup_status").show().html('<div class="info">Please enter your User-Name in the required field to proceed.</div>');
		$("#inputName").focus();
        //        $("#firstName-div").addClass('has-error');
	}
	else if(userCountry == ""){
		$("#signup_status").show().html('<div class="info">Please enter Country name you belong to proceed.</div>');
		$("#inputCountry").focus();
        //        $("#lastName-div").addClass('has-error');
	}
	else if(emails == "")
	{
		$("#signup_status").show().html('<div class="info">Please enter your Email address to proceed.</div>');
		$("#inputEmail").focus();
        //        $("#inputEmail-div").addClass('has-error');
	}
        else if(phone == "" || phone.replace(/\D/g, '').length != 10)
	{
		$("#signup_status").show().html('<div class="info">Please enter your 10 digit phone number.</div>');
		$("#phoneNumber").focus();
        //        $("#phoneNumber-div").addClass('has-error');
	}
        
        else if(dob == "")
	{
		$("#signup_status").show().html('<div class="info">Please enter your date of birth.</div>');
		$("#dob").focus();
        //        $("#dob-div").addClass('has-error');
	}
        else if(about == "")
	{
		$("#signup_status").show().html('<div class="info">Please write something about yourself.</div>');
		$("#dob").focus();
        //        $("#dob-div").addClass('has-error');
	}
        
	else
	{
             var postData = $('#addForm').serialize();

             $.ajax(
             {
              url : 'databaseBusiness/businessLogic.php',
              type : 'POST',
              data : postData ,
              dataType: 'json',
              beforeSend: function(){
                    $("#regsubmit-div").hide();
                    $("#signup_status").show().html('<span clear="all"><div style="padding-left:115px;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;">Please wait</font> <img src="images/loadings.gif" alt="Loading...." align="absmiddle" title="Loading...."/></div></span>');
		},
              success: function(returndata) {
                   // alert(returndata);
                    
                    if(returndata === 1){
                            alert('Registration successful..');
                            $( "#addForm" )[0].reset();
//                            $('#container-adduser').hide(100);
//                            $('#container-listUser').show(300);
                            window.location.replace('index.php');
                           // ajaxView();
                                
                    }
                    else{
                            alert('Registration not successfull cause of internal error');
                    }
                    
                    $("#regsubmit-div").show();
                    $("#signup_status").hide();
                    $( '#sign-up-form' ).each(function(){
                         this.reset();
                    });
                   
              }
             });
    
        }
});




/****************        Update Form Validate and submit          *********/

$('#editsubmit').click(function(event){
        event.preventDefault();
    //  alert('clicked submit');
        var userName = $("#inputName").val();
	var userCountry = $("#inputCountry").val();
	var emails = $("#inputEmail").val();
	var phone = $("#phoneNumber").val();
        var dob = $("#dob").val();
        var about = $("#inputAbout").val();
              
	if(userName == ""){
                $("#signup_status").show().html('<div class="info">Please enter your User-Name in the required field to proceed.</div>');
		$("#inputName").focus();
        //        $("#firstName-div").addClass('has-error');
	}
	else if(userCountry == ""){
		$("#signup_status").show().html('<div class="info">Please enter Country name you belong to proceed.</div>');
		$("#inputCountry").focus();
        //        $("#lastName-div").addClass('has-error');
	}
	else if(emails == "")
	{
		$("#signup_status").show().html('<div class="info">Please enter your Email address to proceed.</div>');
		$("#inputEmail").focus();
        //        $("#inputEmail-div").addClass('has-error');
	}
        else if(phone == "" || phone.replace(/\D/g, '').length != 10)
	{
		$("#signup_status").show().html('<div class="info">Please enter your 10 digit phone number.</div>');
		$("#phoneNumber").focus();
        //        $("#phoneNumber-div").addClass('has-error');
	}
        
        else if(dob == "")
	{
		$("#signup_status").show().html('<div class="info">Please enter your date of birth.</div>');
		$("#dob").focus();
        //        $("#dob-div").addClass('has-error');
	}
        else if(about == "")
	{
		$("#signup_status").show().html('<div class="info">Please write something about yourself.</div>');
		$("#dob").focus();
        //        $("#dob-div").addClass('has-error');
	}
        
	else
	{
             var postData = $('#editForm').serialize();
            
             $.ajax(
             {
              url : 'databaseBusiness/businessLogic.php',
              type : 'POST',
              data : postData ,
              dataType: 'json',
              beforeSend: function(){
                    $("#regsubmit-div").hide();
                    $("#signup_status").show().html('<span clear="all"><div style="padding-left:115px;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;">Please wait</font> <img src="images/loadings.gif" alt="Loading...." align="absmiddle" title="Loading...."/></div></span>');
		},
              success: function(returndata) {
                   if(returndata === 1){
                            alert('1 Row Updated');
                            $( "#editForm" )[0].reset();
                            //window.location.href = 'index.php';
                            window.location.replace('index.php');
                    }
                    else{
                            alert('updation Failed due to internal error');
                            window.location.replace('index.php');
                    }
              }
              
             });
        }
});


/***********   Cancel Update    ********/
$('#editCancel').click(function(event){
    event.preventDefault();
//    window.location.href = "signup.php";
    window.location.replace('index.php');
});