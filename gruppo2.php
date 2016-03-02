<!DOCTYPE html>
<html >
  <head>
  <meta http-equiv="refresh" content="3" />	
    <title> Inserimento nel database</title>
      <style type="text/css">
         body
              {
              background-color: #eee;
              color: blue;
              padding: 20px;
              font-size:35px;
              font-style:011;
              align:center,verdana;
	      }
	form
	      {
	      padding: 20px;
              font-size:35px;
              width:10%;
	      height:10%;
	      }
	      
      </style>

   </head>
  <body>  
     <table>
    <?php
    
	    echo exec("sh prova.sh");
	    //$image_name="/home2/compito/cesare.bmp";
            //echo $image_name;
	    $connessione1=mysql_connect("172.16.3.2","ipmonitor","pswipmonitor")or die (mysql_error()); //fornita dalla frame server
            $ris3=mysql_query("use FrameServer;",$connessione1) or die("Errore 1:".mysql_error()); //fornito dall frame server
	    $Content=file_get_contents('cesare.bmp')or die ("Errore");
	    $Content = addslashes($Content);

	   $query= "INSERT INTO Fotogramma SET Foto='$Content',Giorno= now();";
	   $query2=mysql_query($query,$connessione1)or die("Errore 4 ".$query."--".mysql_error());//fornito dall frame server
	    mysql_close($connessione1);
      ?>
      </table>
    </body>
  </html>
