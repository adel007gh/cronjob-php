<?php
   $filename = "log.txt";
   $file = fopen( $filename, "a+" );
   
   if( $file == false ) {
      echo ( "Error in opening new file" );
      exit();
   }
   $time = time();
   fwrite( $file, "$time \n" );
   fclose( $file );
?>