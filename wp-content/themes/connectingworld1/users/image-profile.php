  <a href="<?php $monUrl ?>/my-page-2?action=editprofile" title="edit" class="bluelink">Edit My Profile</a>  | <a href="<?php $monUrl ?>/my-page-2?action=uploadimage" class="bluelink" title="Upload Image">Upload Image »</a> |  <a href="<?php $monUrl ?>/my-page-2?action=changepassword" title="Change Password" class="bluelink">Change Password » </a>
<?php
function findexts ($filename) { 
$filename = strtolower($filename) ;
 $exts = split("[/\\.]", $filename) ;
  $n = count($exts)-1; 
  $exts = $exts[$n];
   return $exts; }
   
  
   
$blog= ABSPATH;
if ($_REQUEST['submit'])
{
$uploaddir = ABSPATH."wp-content/themes/connectingworld1/users/uploads/";
//$uploadfile = $uploaddir . basename( $_FILES['uploadedfile']['name']);
$fichier = basename($_FILES['uploadedfile']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['uploadedfile']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['uploadedfile']['name'], '.'); 

if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Only File Type png, gif, jpg, jpeg, are allowed!';
}
if($taille>$taille_maxi)
{
     $erreur = 'Maximum File size allowed = 100 kb!';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
	 //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
	  $ext = findexts ($fichier) ; 
 $ran = rand () ; 
  $ran2 = $ran."."; 
 $fichier = $ran2.$ext;

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $uploaddir . $fichier))
{
  
 update_profile ($fichier, $user_id);
  echo "<span class='rouge'>The file has been uploaded successfully</span>";
  $url= bloginfo('url').'/my-page-2?action=viewprofile';
 
  // echo '<meta http-equiv="refresh" content="0; url='.$url.'"/>';
echo '<meta http-equiv="refresh" content="0; url='.$url.'"/>';
  //update_profile ($picture, $id);
}
else
{
  echo "<span class='rouge'>There was an error uploading the file</span>";
}
}
else {echo "<div class='rouge'>".$erreur."</div>";}
}
?>

<?php
 $monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  ?>
 <p class=infobox><br>
Here you can upload a picture that is seen on your user profile page <br>
<br>
- Allowed file format: GIF and JPG/JPEG<br>
- The picture has to be of you,your face has to be clearly visible <br>
- The picture will automatically be cropped to 8m0x100 pixels<br>
- Maximum 100 kb <br><br>
<br>
</p>
<form enctype="multipart/form-data" action="my-page-2?action=uploadimage" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
<input type="hidden" name="completed" value="1">
Choose a file to upload: <input name="uploadedfile" type="file" /><br />
<input type="submit" name="submit" value="Upload File" />
</form>

<hr>