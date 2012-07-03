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
            <?php
            if(isset($_SESSION['user_name']))
            {
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
 <?php
         $database = mysql_connect("localhost", "root", "");
         $username = $_SESSION['user_name'];                           
         mysql_select_db( "mainsql", $database);

         //Figure out who is logged in by comparing session user_name with db username
         $queryusers = "SELECT user_name, user_id FROM user WHERE user_name ='$username'";
         $userresult = mysql_query($queryusers, $database);
         $row = mysql_fetch_array($userresult);

         $queryitem = "SELECT items.item_id, items.item_type, items.item_name, items.item_desc, items.item_price, user.user_email FROM user, items WHERE user.user_id = items.user_id AND user.user_id = ".$row['user_id']." ORDER BY items.item_id";
         $itemresult = mysql_query($queryitem, $database);

         //Wait for link to come in with '?action=del' 
         if(@$_REQUEST['action']=="del")
         {
         mysql_query("DELETE FROM items WHERE item_id=".round($_REQUEST['id']));
         header("Location: myitems.php");
         }
       
         mysql_close($database);

      ?>

      <table>
      <?php
         while ($row = mysql_fetch_array($itemresult))
         {
            print("<tr>");
            print("<td><a>".$row['item_name']." - ".$row['item_desc']." - ".$row['item_price']."</a><br><a onclick=\"return confirm('Are you sure?');\" href=myitems.php?action=del&id=".$row['item_id'].">[DELETE ITEM]</a></td>");
            print("</tr>");

         }
      ?>
      </table>
</div>


</div>
 
</body>
</html>

