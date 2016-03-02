<html>
  <head>
    <title> Inserimento nel database</title>
      <style type="text/css">
         body
        {
          background-color: #FFFACD;
          color: #FF6347;
          padding: 20px;
          font-size:35px;
          font-style:italic;
          align:center, verdana;
	}
        form
        {
	  padding: 20px;
	  margin: 20px 20px 20px 20px;
          font-size:35px;
          width:10%;
	  height:10%;
	}
	table
	 {
	  margin: 50px 50px 50px 50px;
	 }
      </style>
   </head>
   <body>
   <FORM METHOD="GET" ACTION="http://172.16.3.7/~compito/gruppo2f.php">
     inserire chiave fotogramma
    <input type="text" name="fileId"/> <br/>
   </FORM> 
   
   <?php
   if((isset($_GET['fileId'])) && !(empty($_GET['fileId'])))
   {
           echo '<table>';
           echo '<tr>';
           echo '<td>';
           echo "<img src='gruppo2up1.php?fileId=".$_GET['fileId']."'>";
           echo '</td>';
           echo '</tr>';
           echo '</table>';
    }
   ?>
   </body>
</html>
