<?php
$dir_to_scan = !empty($_POST) ? $_POST['dir'] : $_SERVER['DOCUMENT_ROOT'];
$dirs = scandir($dir_to_scan);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Scandir</title>
</head>
<body>
<form action="" method="post">
<?php
function replace_backslash($str) {
  return str_replace("\\", "/", $str);
}

foreach ($dirs as $dir) {
  if (is_dir($dir_to_scan.'/'.$dir)) {
    if (replace_backslash($dir_to_scan).'/'.replace_backslash($dir) != replace_backslash($_SERVER['DOCUMENT_ROOT']).'/..') {
      echo '<button name="dir" type="submit" value="'.realpath($dir_to_scan.'/'.$dir).'"><span class="fa fa-folder"></span> '.$dir.'</button><br>';
    }
  } else {
    echo '<a href="readfile.php?_TARGET='.realpath($dir_to_scan.'/'.$dir).'" target="_blank"><span class="fa fa-file"></span> '.$dir.'</a><br>';
  }
}
?>
</form>
</body>
</html>
