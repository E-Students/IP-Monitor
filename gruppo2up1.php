<?php	
	  if((isset($_GET["fileId"])) && !(empty($_GET["fileId"])))
	  {
	      $blobId=$_GET["fileId"];
	      $connessione1=mysql_connect("172.16.3.2","ipmonitor","pswipmonitor")or die (mysql_error()); //fornita dalla frame server
              $ris3=mysql_query("use FrameServer;",$connessione1) or die("Errore 1:".mysql_error()); //fornito dall frame server
	      $query2=mysql_query("SELECT Foto FROM Fotogramma WHERE IdFoto= $blobId",$connessione1)or die("Errore 4".mysql_error());//fornito dall frame server
	      $riga=mysql_fetch_array($query2);
	      file_put_contents("temporaneo.dat", $riga["Foto"]); 
	      //
	      echo shell_exec("sh decifra.sh");
	      $out=file_get_contents("temporaneodecifrato.bmp");
	      //
	      sleep(1);
	      addslashes($out);
	      header("Content-type: image/bmp");
	      echo $out;
	      mysql_close($connessione1);
	  }
?>
 
