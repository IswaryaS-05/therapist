<!DOCTYPE html>

<html>

<head>

<title>Appointment</title>

 <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body background="appointment.jpg">
 <div class="header">
  	<h2>APPOINTMENT FORM</h2>
   </div>
<form action="index.php" method="post" >
  <div class="container">
<label for="username"><strong>Username:</strong></label>
<input type="text" id="username" name="username" required>
  <p><strong>Please select your gender:</strong></p>
  <input type="radio" id="male" name="gender" value="male">Male<br>
  <input type="radio" id="female" name="gender" value="female">Female<br>
  <input type="radio" id="other" name="gender" value="other">Other<br>
<p><strong>Please select your age:</strong></p>
  <input type="radio" id="age1" name="age" value="30">0 - 30<br>
  <input type="radio" id="age2" name="age" value="60">31 - 60<br>  
  <input type="radio" id="age3" name="age" value="100">61 - 100<br>
  <label for="meeting-time"><strong>Choose a date for your appointment:</strong></label>
<input type="datetime-local" id="date"
       name="date" value="2020-05-01T19:30"
       min="2020-05-01T09:00" max="2040-06-14T18:00" required><br/>
<label for="phone"><strong>Phone Number:</strong></label>
<input type="tel" id="phone" name="phone"
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br/>
<small>Format: 123-456-7890</small><br/>
<label for="username"><strong>Symptoms:</strong></label>
<input type="text" id="symptoms" name="symptoms" required>
 <input type="submit" name="submit" value="submit"><br/>
</div>
</form>
</body>
</html>

<?php
$servername="localhost";
$username="root";
$password="";
$db="reg";
$conn=mysqli_connect($servername,$username,$password,$db);
if(!$conn){
die("Connection failed: " . mysqli_connect_error);
}
if(isset($_POST['submit']))
{
$username = $_POST['username'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$date = $_POST['date'];
$phone = $_POST['phone'];
$symptoms = $_POST['symptoms'];
$sql = "INSERT INTO users(username,gender,age,date,phone,symptoms)
VALUES ('$username' , '$gender' , '$age' , '$date' , '$phone' , '$symptoms')";
if(mysqli_query($conn ,  $sql)){
   echo "<p><strong><center><h1>Dear Mr/Mrs/Ms An appointment has been made</h1></strong></center></p>
<p><h4>It would be helpful if a family member or friend could attend this appointment with you.It would also be helpful if you could have with you a list of all your current medication(prescribed)";
}
else{
echo "Error: " . $sql . "<br>" .mysqli_error($conn);
}
mysqli_close($conn);
}
?>