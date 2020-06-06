<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
column-count: 6;
column-gap: 40px;
}
td {
  border: 1px solid #999;
}
th {
border: 1px solid #999;
color: black;
background-color: #F8F8FF
}

</style>
</head>
<body>
<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Gender</th>
<th>Age</th>
<th>Date and time</th>
<th>Phone number</th>
<th>Symptoms  </th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "reg");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, username,gender,age,date,phone,symptoms FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" .$row["username"] . "</td><td>".
 $row["gender"]."</td><td>". $row["age"]. "</td><td>" . $row["date"]. "</td><td>". $row["phone"]. "</td><td>". $row["symptoms"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>