<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'Principals';
mysql_select_db($dbname);

$query = "SELECT * FROM users";
$result = mysql_query($query) 
or die(mysql_error()); 
print " 
<table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"#C0C0C0\"><tr> 
<td width=100>Number:</td> 
<td width=100>User Name:</td> 
<td width=100>Password Hashed:</td> 
<td width=100>Email:</td> 
<td width=100>Active Status:</td> 

</tr>"; 

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
print "<tr>"; 
print "<td>" . $row['id'] . "</td>"; 
print "<td>" . $row['username'] . "</td>"; 
print "<td>" . $row['password'] . v . $row['players'] . "</td>"; 
print "<td>" . $row['email'] . "</td>";
print "<td>" . $row['activ_status'] . "</td>";
 
print "</tr>"; 
} 
print "</table>"; 
?>