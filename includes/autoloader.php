<?php

	/*** Anulo todos los autoload existentes ***/
    spl_autoload_register(null, false);

    /*** especifico que extensiones se abriran ***/
    spl_autoload_extensions('.class.php');

    /*** clase Loader ***/
    function classLoader($class)
    {
        $filename = strtolower($class) . '.class.php';
        $file = 'includes/' . $filename;
        if (!file_exists($file))
        {
            return false;
        }
        include $file;
    }

    /*** registro la funcion Loader ***/
    spl_autoload_register('classLoader');
	
?>
