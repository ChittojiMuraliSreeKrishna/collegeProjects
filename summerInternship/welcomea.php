<?php  
// Initialize the session  
  
  
session_start();  
   
// Check if the user is logged in, if not then redirect him to login page  
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){  
    header("location: logina.php");  
    exit;  
}  
?>  
  
  
  
   
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>Welcome</title>  
 <link rel="stylesheet"  type="text/css" href="table.css">  
    <style type="text/css" >  
        body{ font: 14px sans-serif; text-align: center;}  
             
            </style>  
</head>  
<body>  
  
  <p>  
        <a href="reset-passworda.php" class="btn btn-warning" style=" width: 50%; float: left;" >Reset Your Password</a>  
        <a href="logouta.php" class="btn btn-danger " style="corner:right">Sign Out of Your Account</a>  
    </p>  
  
    <div class="page-header">  
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site admin.</h1>  
    </div>  
  
    
        <div class="contact-form">  
<form id="contact-form" method="post" action="speech.html">  
</div>  
<div class="clear"></div>  
</div>  
<div class="clear"></div>  
</div>  
<!--</div> -->  
  
<table id="tblData">  
   <tr>  
      <th>  
           
      </th>  
      <th>id</th>  
      <th>name</th>  
      <th>message</th>  
   </tr>  
   <?php  
  
require_once "configa.php";  
$query = mysqli_query($link," select * from tbl_form");  
$cntr = 0;  
while ($row = mysqli_fetch_array($query)) {  
$cntr = $cntr+1;      
echo "<tr><td><input type=\"checkbox\" id=\"check".$cntr."\"/></td><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["message"]."</td></tr>";  
  
}  
?>  
     
</table>  
  
<p align="left">  
</p>  
<br><br>  
<input type="reset"  value="cancel" > </input>              
  
   
<input type="button" onClick="GetSelected()"  value="post" />             
<input type="submit"  value="hold" /><br>  
  
   
   
</form>  
      
</body>  
</html>  
  
  
  
  
<?php  
mysqli_close($link); // Closing Connection with Server  
?>  
  
  
  
<script>  
$(document).ready(function() {  
    $('#chkParent').click(function() {  
        var isChecked = $(this).prop("checked");  
        $('#tblData tr:has(td)').find('input[type="checkbox"]').prop('checked', isChecked);  
    });  
  
    $('#tblData tr:has(td)').find('input[type="checkbox"]').click(function() {  
        var isChecked = $(this).prop("checked");  
        var isHeaderChecked = $("#chkParent").prop("checked");  
        if (isChecked == false & & isHeaderChecked)  
            $("#chkParent").prop('checked', isChecked);  
        else {  
            $('#tblData tr:has(td)').find('input[type="checkbox"]').each(function() {  
                if ($(this).prop("checked") == false)  
                    isChecked = false;  
            });  
            $("#chkParent").prop('checked', isChecked);  
        }  
    });  
});  
  
  
</script>  
  
  
<script type="text/javascript">  
      
      
    function GetSelected() {  
        //Reference the Table.  
        var grid = document.getElementById("tblData");  
   
        //Reference the CheckBoxes in Table.  
        var checkBoxes = grid.getElementsByTagName("INPUT");  
        var message = "message\n";  
   
        //Loop through the CheckBoxes.  
        for (var i = 0; i < checkBoxes.length; i++) {  
            if (checkBoxes[i].checked) {  
                var row = checkBoxes[i].parentNode.parentNode;  
                //message += row.cells[1].innerHTML;  
                message += "   " + row.cells[3].innerHTML;  
                message += "\n";  
            }  
        }  
   
        //Display selected Row data in Alert Box.  
        alert(message);  
        //document.getElementById("selectedtext").value = message;  
        window.location.href="speech.html?message="+message;  
    }  
      
      
</script>  
