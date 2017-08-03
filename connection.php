<?php
//$con = mysqli_connect("localhost","root","","demo");
//$con = mysqli_connect("localhost","seorslrb_chatbot","Chatbot99*#","seorslrb_chatbot");
$con = mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b7605f40603ab6","878ceb7a","heroku_3b3b10469646018");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
?>