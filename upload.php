<?php
    spl_autoload_register(function ($class) {
        include_once('includes/' . $class . '.class.php');
    });

?>
<?php
if (isset($_FILES['image'])) {

    $img = new Imagen();
    $img->uploadImage();
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
