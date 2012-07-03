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
<a href="Index.php">JindalsList: Appliances</a>
</h1>
</div>

<div id="navigation">
 <nav>
         <ul><center>
            <!--Check to see if user session is created. Display user options if created, otherwise show login and join button-->
            <?php
            session_start();
            if(isset($_SESSION['user_name']))
            {
            print("<li><a href="."myitems.php".">My Items</a></li>");
            print("<li><a href="."newitem.html".">Post New Item</a></li>");
            print("<li><a href="."logout.php".">Log Out</a></li>");
            }
            else
            {
            print("<li><a href="."login.php".">Log In</a></li>");
            print("<li><a href="."newuser.html".">Join</a></li>");
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
       
         $queryitem = "SELECT items.item_type, items.item_name, items.item_desc, items.item_price, user.user_email FROM user, items WHERE user.user_id = items.user_id AND items.item_type = 'appliances' ORDER BY items.item_name";
         //$queryemail = "SELECT user.user_email, user.user_id, item.user_id FROM user, items WHERE user.user_id = items.user_id";
         $database = mysql_connect("localhost", "root", "");                           
         mysql_select_db( "mainsql", $database);

         //$sql = "INSERT INTO urltable (URL, Description) VALUES ('$_POST[url]', '$_POST[desc]')";

         //mysql_query($sql, $database);   
         
         $itemresult = mysql_query($queryitem, $database);
       
         mysql_close($database);

      ?>

      <table>
      <?php
         while ($row = mysql_fetch_array($itemresult))
         {
            print("<tr>");
            print("<td><a href=mailto:".$row['user_email']."?Subject=JindalsList:%20".$row['item_type']."%20for%20sale>".$row['item_name']." - ".$row['item_desc']." - ".$row['item_price']."</a></td>");
            print("</tr>");

            //print("<tr>");
            //foreach ($row as $value) 
             //  print("<td><a href=mailto:".$row[4]."?Subject=JindalsList:%20".$row[2]."%20for%20sale>".$value."</a></td>");
              // print("</tr>");
         }
      ?>
      </table>
</div>


</div>
 
</body>
</html>

