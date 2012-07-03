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

<script type="text/javascript">
function delayer(){
   document.location="myitems.php"
}
</script>

<body onLoad="setTimeout('delayer()', 1000)">
<center>
<h2>Item Added!</h2>
</center>
<body>

<div id="container">

<div id="header">
<h1>
<a href="Index.php"> 
<?php
session_start(); 
if(isset($_SESSION['user_name']))
echo $_SESSION['user_name']."'s items";
else
echo "Guest!";
?>
</a>
</h1>
</div>

<div id="navigation">
 <nav>
         <ul><center>
            <li><a href="myprofile.html">My Profile</a></li>
            <li><a href="myitems.html">My Items</a></li>
            <li><a href="newitem.html">Post New Item</a></li>
            <li><a href="logout.php">Log Out</a></li>
         </ul>
         </center>
      </nav>
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
   <?php   
         $database = mysql_connect("localhost", "root", "");
         $username = $_SESSION['user_name'];                           
         mysql_select_db( "mainsql", $database);

         $queryusers = "SELECT user_name, user_id FROM user WHERE user_name ='$username'";
         $userresult = mysql_query($queryusers, $database);
         $row = mysql_fetch_array($userresult);

         $sql = "INSERT INTO items (item_name, item_desc, item_price, item_type, user_id) VALUES ('$_GET[itemname]', '$_GET[itemdesc]', '$_GET[itemprice]', '$_GET[itemtype]', ".$row['user_id'].")";
         mysql_query($sql, $database);               
         mysql_close($database);
   ?>
</div>

</div>
 
</body>
</html>



