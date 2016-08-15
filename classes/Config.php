<?php

class Config {

  /**
  * @desc               Grabs the configation variable value
  * @param  str $path   This is the path through the GLOBALS config array defined in init.php
  * @return str         Value of config variable defined in init.php or returns false if no value defined
  */
  public static function get($path = null) {
    if($path) {
      $config = $GLOBALS['config'];
      $path = explode('/', $path);

      foreach($path as $bit) {
        if(isset($config[$bit])) {
          $config = $config[$bit];
        }
      }
      return $config;
    }

    return false;
  }




}
