<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Online Examination </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<!-- Homepage Specific Elements -->
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="scripts/jquery.tabs.setup.js"></script>
<script type="text/javascript" src="validate.js" ></script>
<!-- End Homepage Specific Elements -->
</head>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <img src="logo.png" width="960" height="100" border="0" alt="Holistic Bible College">
    </div>
    <div class="fl_right">      
      <form action="#" method="post" id="sitesearch">
        <fieldset>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div class="rnd">
    <!-- ###### -->
    <div id="topnav">
      <ul>
        <li class="active"><a href="index.php"><b>Home</b></a></li>
        <li><a href="student-login.php"><b>Student</b></a></li>
        <li><a href="department-login.php"><b>Department</b></a></li>
        <li><a href="admin-login.php"><b>Administrator</b></a></li>
				<li><a href="help.php"><b>Help</b></a></li>

      </ul>
    </div>
	</div>
</div> 
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
	<table width="200" border="0">
        <tr>
          <td width="24%" ><table width="200" border="0">
            <tr>
			<td>
			<h1 align="center">Available Links</h1>
			</td>
			</tr>
			<tr>
			<td>			  
			  <a href="student-registration.php">Student Registration</a>
			  </td>
			  <tr>
			  <td>
			   <?php
					
$con = mysqli_connect("localhost","root","","online");
//mysqli_select_db("online", $con);

$sql = "SELECT * FROM links where linkName = 'department registartion'";
$result = mysqli_query($con,$sql);
$records = 0;
while($row = mysqli_fetch_array($result))
{
$linkName=$row['linkName'];
$status=$row['status'];
}
mysqli_close($con);
?>
		  <?php
		  if($status == 'Inactive')
		  {
		  ?>
		  <p><a href="#">Department Registration</a></p>
		  <?php
		  }
		  else
		  {
		  ?>
          <p><a  href="department_registration.php">Department Registration</a></p>
		  <?php
		  }
		  ?>

			  </td>
			  </tr>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table></td>
          <td><h1 align="center"><b>Student Registration Form </b></h1>
            <p>Welcome to Holistic Bible College online examination system registration form. 
			Students who want to learn online education in our college can register themselves
			for various competitive education through this webapplication.</p>
           <h1 align="center"> </h1>
          <p>&nbsp;</p></td>
          <td width="15%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="61%"><form name="form1" id="validateStudent" method="post" action="" onsubmit="return validateform('validateStudent');">
		
		<table border="0">
		
          <tr>
            <td width="22%">First Name: </td>
            <td width="41%">
              <input type="text" name="name" size="" onkeyup="isalpha(this)"/>
            </td>
          </tr>
          <tr>
            <td>Middle Name: </td>
            <td>
              <input type="text" name="mname" onkeyup="isalpha(this)"/>
            </td>
          </tr>
          <tr>
            <td>Last Name: </td>
            <td>
              <input type="text" name="lname" onkeyup="isalpha(this)"/>
            </td>
          </tr>
          <tr>
            <td>Gender:</td>
            <td><select name="cmbGender" id="cmbGender" style="width:140px" >
              <option selected>--SELECT--</option>
			  <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select></td>
          </tr>
          <tr>
            <td>Age:</td>
            <td>
              <input type="text" name="age" onkeyup="isTwo(this)"/>
            </td>
          </tr>
          <tr>
            <td>Address:</td>
            <td>
              <input type="text" name="address" onkeyup="isalpha(this)"/>
            </td>
          </tr>
          <tr>
            <td>Region:</td>
            <td><select name="cmbRegion" id="cmbRegion" style="width:140px" >
			  <option selected>--SELECT--</option>
              <option value = "Addis Abeba">Addis Abeba</option>
              <option value = "Oromia">Oromia</option>
              <option value = "Amhara">Amhara</option>			  
              <option value = "Tigray">Tigray</option>
              <option value = "Afar">Afar</option>
              <option value = "Somale">Somale</option>
              <option value = "SNNPR">SNNPR</option>
              <option value = "Harar">Harar</option>
              <option value = "Benshangul">Benshangul</option>
			  <option value = "Benshangul">Benshangul</option>
            </select></td>
          </tr>
          <tr>
            <td>Department:</td>
            <td>
			<?php
			$con = mysqli_connect("localhost","root","","online");
            //mysqli_select_db("online", $con);
			?>
			<?php $department= mysqli_query($con,"select * from department_registration"); ?>
             <select name="cmbDepartment" id="cmbDepartment" style="width:140px" >
             <?php while($result= mysqli_fetch_assoc($department))
                         { ?>
                    <option>
                    <?php echo $result['department']?>
                    </option>
                    <?php }?>
                    </select>
			
			</td>
          </tr>
          <tr>
            <td>Program:</td>
            <td><select name="cmbProgram" id="cmbProgram" style="width:140px" >
			<option selected>--SELECT--</option>
              <option>Diploma</option>
              <option >Degree</option>
              <option>Masters</option>
              
                                                </select></td>
          </tr>
          <tr>
            <td>Phone Number: </td>
            <td>
              <input type="text" name="phone" onkeyup="isPhoneNo(this)"/>
            </td>
          </tr>
          <tr>
            <td>Email:</td>
            <td>
              <input type="text" name="email" />
            </td>
          </tr>
          <tr>
            <td>Password:</td>
            <td>
              <input type="password" name="password" />
            </td>
          </tr>
          <tr>
            <td>Confirm Password: </td>
            <td>
              <input type="password" name="confirmPass" />
            </td>
          </tr>
		  <tr>
		  
		  <td align="center"></td>
		  <td> <input type="submit" name="Submit" value="Register" />
		  <input type="reset" name="reset" value="Reset" /></td>
		
		  </tr>
        </table>
		</form> 
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
	  <?php
	  if(isset($_POST['Submit']))
	  {
	  
	$name=$_POST['name'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$gender=$_POST['cmbGender'];
	$age=$_POST['age'];
	$address=$_POST['address'];
	$region=$_POST['cmbRegion'];
		$department=$_POST['cmbDepartment'];
	$program=$_POST['cmbProgram'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$status = "Inactive";

	$con = mysqli_connect ("localhost","root","","online");
	
	//mysqli_select_db("online", $con);

	//=======================================================================================
	$sql1 = "SELECT * FROM student_registration where email = '".$email."'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
{
$ExistedEmail = $row['email'];
} 
$emails = mysqli_num_rows($result);
if($emails > 0)
{
echo '<script type="text/javascript">alert("Student Already Exist!");</script>';
}
else if($emails == 0)
  {
	//=======================================================================================
	
	$sql = "insert into student_registration (name,mname,lname,gender,age,address,region,department,program,phone,email,password,status)  values('".$name."','".$mname."','".$lname."','".$gender."','".$age."','".$address."','".$region."','".$department."','".$program."','".$phone."','".$email."','".$password."','".$status."')";

	mysqli_query ($con,$sql);

	mysqli_close ($con);
	echo '<script type="text/javascript">alert("You are registered Succesfully!");window.location=\'student-registration.php\';</script>';
 }
	  }
	  ?>
      <!-- ####################################################################################################### -->
     
      <!-- ####################################################################################################### -->
   
      <!-- ####################################################################################################### -->
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">&copy;  - All Rights Reserved - <a href="#">Holistic Bible College</a></p>
    
  </div>
</div>
</body>
</html>