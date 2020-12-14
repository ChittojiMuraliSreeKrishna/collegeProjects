<?php  
// Initialize the session  
session_start();  
   
// Check if the user is logged in, if not then redirect him to login page  
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){  
    header("location: login1.php");  
    exit;  
}  
?>  
 <?php    
   $link = mysqli_connect("localhost", "root", "", "admin");    
 if(isset($_POST["name"]))    
 {    
      $name = mysqli_real_escape_string($link, $_POST["name"]);    
      $message = mysqli_real_escape_string($link, $_POST["message"]);    
      $sql = "INSERT INTO tbl_form(name, message) VALUES ('".$name."', '".$message."')";    
      if(mysqli_query($link, $sql))    
      {    
           echo "Message Saved";    
      }    
        
 }    
 ?>    
   
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>Welcome</title>  
 <link rel="stylesheet"  type="text/css" href="style.css">  
    <style type="text/css">  
        body{ font: 14px sans-serif; text-align: center; }  
    </style>  
</head>  
<body>  
  
  <p>  
        <a href="reset-password.php" class="btn btn-warning" style=" width: 50%; float: left;" >Reset Your Password</a>  
        <a href="logout.php" class="btn btn-danger " style="corner:right">Sign Out of Your Account</a>  
    </p>  
  
    <div class="page-header">  
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>  
    </div>  
  
    
        <div class="contact-form">  
<form id="contact-form" method="post" action="">  
 <label>Name</label>    
                     <input type="text" name="name" id="name" class="form-control" />    
                     <br />   
 <label>Message</label>    
                     <textarea name="message" id="message" class="form-control">
<input type="reset"  value="cancel" > </input>               
<input type="submit"  value="submit"><br>  
 <span id="error_message" class="text-danger"></span>    
                     <span id="success_message" class="text-success"></span>    
</div>       
</body>  
</html>  
<script>    
 $(document).ready(function(){    
      $('#submit').click(function(){    
           var name = $('#name').val();    
           var message = $('#message').val();    
           if(name == '' || message == '')    
           {    
                $('#error_message').html("All Fields are required");    
           }    
           else    
           {    
                $('#error_message').html('');    
                $.ajax({    
                     url:"welcome1.php",    
                     method:"POST",    
                     data:{name:name, message:message},    
                     success:function(data){    
                          $("form").trigger("reset");    
                          $('#success_message').fadeIn().html(data);    
                          setTimeout(function(){    
                               $('#success_message').fadeOut("Slow");    
                          }, 2000);    
                     }    
                });    
           }    
      });    
 });    
 </script>    
