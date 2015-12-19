<?php
    spl_autoload_register(function ($class) {
        include_once('includes/' . $class . '.class.php');
    });

?>
<?php
if (isset($_FILES['image'])) {

    $img = new Imagen();
    $img->uploadImage();
    $thefile = $img->get_upload_path().$img->get_file_name();
    $output = $img->get_upload_path()."thumb_".$img->get_file_name();
    $result = $img->resizeImage($thefile, null, 200, 0, true, $output, false, false, 100, false);
    if(!$result) {
      echo "Un error ha ocurrido al redimensionar su imagen";
    }
}
?>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>

      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>

   </body>
</html>
