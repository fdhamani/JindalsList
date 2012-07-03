<?php 
//Create a session
session_start(); 

//Make a connection to the database
$dbh = mysql_connect("localhost", "root", "");
mysql_select_db ("mainsql");
$user="";
$password="";

//Retrieve the form elements values
if (isset($_POST['user_name'])) {
  $user = $_POST['user_name'];
}
if (isset($_POST['user_pw'])) {
  $password = $_POST['user_pw'];
}
if (isset($_GET['user_name'])) {
  $user = $_GET['user_name'];
}
if (isset($_GET['user_pw'])) {
  $password = $_GET['user_pw'];
}

//If login is not blank retrieve user information
if($user!="" || $password !="") {
	$query ="SELECT * FROM user WHERE user_name='".$user."' AND user_pw='".$password."'";
	$result = mysql_query($query, $dbh);
	$affected_rows =mysql_num_rows($result);

//If match found then login succeeded. Set session and redirect to homepage.
if ($affected_rows==1) {
	$_SESSION['user_name'] = $user;
 	header("Location: Index.php");
}

else {
//If match not found, inform the user
  print "<center><font color=red><b>Incorrect username or password or both. Try again.</b></font></center>";
	}
}
else
{
  print "<center><b>Please Login</b></center>";
}
?>


<html>
<head>
<meta charset = "utf-8">
<title>jindalslist: UTD classifieds for textbooks, electronics, furniture, appliances, automotive parts, and more</title>
<link rel = "stylesheet" type = "text/css" 
href = "main.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="js/jquery.color.js"></script>
<script src="js/script.js"></script>
</head>

<body>

<div id="container">

<div id="header">
<h1>
<a href="Index.php">Welcome to Jindal's List, 
<?php
if(isset($_SESSION['user_name']))
echo $_SESSION['user_name'];
else
echo "Guest";
?>
</a>
</h1>
</div>


<div id="searchbar">
<!--
OLD SEARCH METHOD
<form method="get" action="keyword.php">
  <input type="text" name="search" placeholder="Search by keyword" size=85>
  <input type="submit">
</form>
-->
<form id="searchForm" method="get" action="keyword.php">
<div class="input">
<input type="text" name="search" id="s" value="Search" autocomplete=off>
</div>
<input type="submit" id="searchSubmit" value=""/>
</form>
</div>

<div id="categories">
<b><u>Categories</u></b><br/>
<a href="Index.php">All Items</a><br/>
<a href="Textbooks.php">Text Books</a><br/>
<a href="Electronics.php">Electronics</a><br/>
<a href="Furniture.php">Furniture</a><br/>
<a href="Appliances.php">Appliances</a><br/>
<a href="Automotive.php">Automotive</a><br/>
<a href="Services.php">Services</a><br/>
<a href="Misc.php">Misc.</a><br/>
</div>

<div id="content">
<form name="loginForm" action="login.php" method="post">
	<input type="text" name="user_name" placeholder="Username" size=85></br>
   	<input type="password" name="user_pw" placeholder="Password" size=85></br>
   	<input type="submit" name="Login" value="Login">
</form>

</div>


</div>
 
</body>
</html>
