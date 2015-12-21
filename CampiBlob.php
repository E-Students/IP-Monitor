<!DOCTYPE html>
<html>
  <head>
    <title> prova campi blob</title>
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
        inserisci fotogramma da server web
	    <FORM METHOD="POST" ACTION="http://localhost/~compito/CampiBlob.php" enctype="multipart/form-data">
           
            <input type="file" name="immagine"/> 
            <input type="reset" name="RESET" />
            <input type="submit" name="INVIO" />
            
	  </FORM> 
        <table>
	<?php	
       for($i=0;$i<999;$i++)
       {
            sleep (1);
	    shell_exec(" wget http://172.16.3.1/foto.jpg");
	    if(isset($_POST['INVIO']))
	    {
	      //  echo "sono qui";
	      $connessione=mysql_connect("172.16.3.7","root","")or die (mysql_error());
	    //    print_r($_FILES);
	      $image_name=$_FILES['immagine']['name'];
	    //   echo $image_name;
		
              $image_tmp=$_FILES['immagine']['tmp_name'];
	      $dirUpload='/home2/compito/public_html/saved/';
	      $image_name=$dirUpload.$image_name;
	      if (is_uploaded_file($image_tmp))
	      {   
		echo "uploaded ok";
		if (move_uploaded_file($image_tmp,$image_name))
		{
		   echo "file trasferito con successo";
		}
	        else 
		   echo "file non trasferito";
	      }
	      else 
	        echo("No File Uploaded");
	      $ris2=mysql_query("use magazzino;",$connessione) or die("Errore 1:".mysql_error());
	      if(isset($image_name))
	      {
	         echo $image_name;
		 $query1=mysql_query("Insert into CampiBlob set Foto=LOAD_FILE('$image_name')",$connessione)or die("Errore 4".mysql_error());   
	      }
	      mysql_close($connessione);
            }
	}
      ?>
      </table>
    </body>
  </html>
