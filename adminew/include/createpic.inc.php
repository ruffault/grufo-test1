<?php
function unlink_wc($dir, $pattern){
   if ($dh = opendir($dir)) {
      
       //List and put into an array all files
       while (false !== ($file = readdir($dh))){
           if ($file != "." && $file != "..") {
               $files[] = $file;
           }
       }
       closedir($dh);
      
      
       //Split file name and extenssion
       if(strpos($pattern,".")) {
           $baseexp=substr($pattern,0,strpos($pattern,"."));
           $typeexp=substr($pattern,strpos($pattern,".")+1,strlen($pattern));
       }else{
           $baseexp=$pattern;
           $typeexp="";
       }
      
       //Escape all regexp Characters
       $baseexp=preg_quote($baseexp);
       $typeexp=preg_quote($typeexp);
      
       // Allow ? and *
       $baseexp=str_replace(array("\*","\?"), array(".*","."), $baseexp);
       $typeexp=str_replace(array("\*","\?"), array(".*","."), $typeexp);
      
       //Search for pattern match
       $i=0;
       foreach($files as $file) {
           $filename=basename($file);
           if(strpos($filename,".")) {
               $base=substr($filename,0,strpos($filename,"."));
               $type=substr($filename,strpos($filename,".")+1,strlen($filename));
           }else{
               $base=$filename;
               $type="";
           }
      
           if(preg_match("/^".$baseexp."$/i",$base) && preg_match("/^".$typeexp."$/i",$type))  {
               $matches[$i]=$file;
               $i++;
           }
       }
      
       while(list($idx,$val) = each($matches)){
           if (substr($dir,-1) == "/"){
               unlink($dir.$val);
           }else{
               unlink($dir."/".$val);
           }
       }
      
   }
}

//Cree des image minatures
function RatioResizeImg( $image, $newWidth, $newHeight, $path, $imageDest)
{
 // chemin complet de l'image :
 $chemin = $path.$image;

 // détéction du type de l'image
 preg_match("/(...)$/i",$chemin,$regs);
 $type = $regs[1];

 switch( $type )
 {  
  case "jpg": $srcImage = @imagecreatefromjpeg( $chemin ); break;  
  case "png": $srcImage = @imagecreatefrompng( $chemin ); break;  
  default : unset( $type ); break;
 }  

 if( $srcImage )
 {
  // hauteurs/largeurs
  $srcWidth = imagesx( $srcImage );  
  $srcHeight = imagesy( $srcImage );  
  $ratioWidth = $srcWidth/$newWidth;
  $ratioHeight = $srcHeight/$newHeight;
     
  // taille maximale dépassée ?
  if (($ratioWidth > 1) || ($ratioHeight > 1))
  {
   if( $ratioWidth < $ratioHeight)
   {  
    $destWidth = $srcWidth/$ratioHeight;
    $destHeight = $newHeight;  
   }
   else
   {  
    $destWidth = $newWidth;  
    $destHeight = $srcHeight/$ratioWidth;
   }
  }
  else
  {
   $destWidth = $srcWidth;
   $destHeight = $srcHeight;
  }
 
  $destImage = imagecreatetruecolor( $destWidth, $destHeight);  
  imagecopyresampled( $destImage, $srcImage, 0, 0, 0, 0, $destWidth,$destHeight,$srcWidth,$srcHeight );
  $dest_file = $path.$imageDest;
  //$dest_file  = $path.$image;
   
  switch( $type )
  {  
   case "jpg": imagejpeg($destImage, $dest_file);  break;  
   case "png": imagepng($destImage, $dest_file); break;  
   default : unset( $type ); break;
  }    
   
 
  imagedestroy( $srcImage );
  imagedestroy( $destImage );
     
  //return $dest_file;
 }
}
?>
