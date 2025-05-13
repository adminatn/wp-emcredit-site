<?php
//$servername = "localhost:3306";
$connectstr_dbhost = getenv('DATABASE_HOST');
$username = "xjgjsqltwjatn";
$password = "Emcreditatn@2025!";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>