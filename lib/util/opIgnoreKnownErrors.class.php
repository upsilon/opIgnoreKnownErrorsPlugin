<?php

class opIgnoreKnownErrors
{
  protected static $knownErrors = null;

  public static function loadConfig($yamlPath)
  {
    self::$knownErrors = sfYaml::load($yamlPath);
  }

  public static function isMatch($errno, $errstr, $errfile, $errline)
  {
    $rootDir = sfConfig::get('sf_root_dir');

    foreach (self::$knownErrors as $knownError)
    {
      if (constant($knownError['errno']) !== $errno)
      {
        continue;
      }
      if ($knownError['errstr'] !== $errstr)
      {
        continue;
      }
      if ($rootDir.'/'.$knownError['errfile'] !== $errfile)
      {
        continue;
      }
      if ($knownError['errline'] !== null && !in_array($errline, (array)$knownError['errline'], true))
      {
        continue;
      }

      return true;
    }

    return false;
  }
}
