<!DOCTYPE html>

<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="index, nofollow">
    <meta name="keywords" content="<?=$keywords?>" />
    <?if($expires):?>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="expires" content="0">  
    <?endif?>

    <title><?=$title?></title>
    
    <!-- Load CSS librarys -->
    <?foreach($stylesheets AS $load_css):?>
   <?=$load_css?>
    <?endforeach;?>
   <!-- Load Javascript librarys -->
    <?foreach($javascripts AS $load_script):?>
   <?=$load_script?>
    <?endforeach;?>
    
     <!-- favicon -->
     <link rel="shortcut icon" href="<?=$helper->urldispatch('images')?>favicon.ico" type="image/x-icon">
     <link rel="icon" href="<?=$helper->urldispatch('images')?>images/favicon.ico" type="image/x-icon">
  </head>

  <body>
    <!-- Wrap all page content here -->
    <div id="wrap">





