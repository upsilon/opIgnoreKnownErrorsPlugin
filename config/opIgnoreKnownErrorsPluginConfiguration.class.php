<?php

require_once __DIR__.'/../lib/util/opIgnoreKnownErrors.class.php';

class opIgnoreKnownErrorsPluginConfiguration extends sfPluginConfiguration
{
  public function configure()
  {
    opIgnoreKnownErrors::loadConfig(__DIR__.'/known_errors.yml');

    set_error_handler(function($errno, $errstr, $errfile, $errline)
    {
      return opIgnoreKnownErrors::isMatch($errno, $errstr, $errfile, $errline);
    });
  }
}
