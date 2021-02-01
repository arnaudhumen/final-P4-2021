<?php
function autoload($classname)
{
  if (file_exists($file = 'Model/' . $classname . '.php'))
  {
    require $file;
  }
}

spl_autoload_register('autoload');