<?php
session_start(); 
unset($_SESSION['user_name']);
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

<script type="text/javascript">
function delayer(){
   document.location="Index.php"
}
</script>

<body onLoad="setTimeout('delayer()', 1000)">
<center>
<h2>You have been logged out!</h2>
</center>
<body>

<div id="container">

<div id="header">
<h1>
<a href="Index.php">Thanks for visiting Jindal's List!
</a>
</h1>
</div>

<div id="navigation">
 <nav>
         <ul><center>
            <?php
            if(isset($_SESSION['user_name']))
            {
            print("<li><a href="."myprofile.html".">My Profile</a></li>");
            print("<li><a href="."myitems.html".">My Items</a></li>");
            print("<li><a href="."newitem.html".">Post New Item</a></li>");
            print("<li><a href="."logout.php".">Log Out</a></li>");
            }
            else
            {
            print("<li><a href="."login.php".">Log In</a></li>");
            print("<li><a href="."newuser.php".">Join</a></li>");
            }
            ?>
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
</div>

</div>
 
</body>
</html>