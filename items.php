 <html>
   <head>
      <meta charset = "utf-8">
      <title></title>
  
   <style type = "text/css">
         body  { font-family: sans-serif;
                 background-color: white; } 
         table { background-color: skyblue; 
                 border-collapse: collapse; 
                 border: 1px solid gray; }
         td    { padding: 5px; }
         tr:nth-child(odd) {
                 background-color: lightyellow; }
      </style>
   </head>
   <body>

 <?php
       
         $query = "SELECT items.item_name, items.item_desc, items.item_type, user.user_name, user.user_email FROM user, items WHERE user.user_id = items.user_id";

         $database = mysql_connect("localhost", "root", "");                    
         
         mysql_select_db( "mainsql", $database);

         //$sql = "INSERT INTO urltable (URL, Description) VALUES ('$_POST[url]', '$_POST[desc]')";

         //mysql_query($sql, $database);   
         
         $result = mysql_query($query, $database);
        
         mysql_close($database);

      ?>


      <table>
        
         <?php
         
            while ($row = mysql_fetch_row($result))
            {
               print("<tr>");
               foreach ($row as $value ) 
                  print("<td>$value</td>");
                  print("</tr>");
            }

         ?>

      </table>