<?php

require_once dirname(__FILE__).'/../lib/util/opIgnoreKnownErrors.class.php';

class opIgnoreKnownErrorsPluginConfiguration extends sfPluginConfiguration
{
  public function configure()
  {
    opIgnoreKnownErrors::loadConfig(dirname(__FILE__).'/known_errors.yml');

    set_error_handler(array($this, 'errorHandler'));
  }

  public function errorHandler($errno, $errstr, $errfile, $errline)
  {
    return opIgnoreKnownErrors::isMatch($errno, $errstr, $errfile, $errline);
  }
}
