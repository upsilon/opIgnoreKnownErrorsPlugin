<?php

require_once dirname(__FILE__).'/../lib/util/opIgnoreKnownErrors.class.php';

class opIgnoreKnownErrorsPluginConfiguration extends sfPluginConfiguration
{
  private $origHandler;

  public function configure()
  {
    opIgnoreKnownErrors::loadConfig(dirname(__FILE__).'/known_errors.yml');

    $this->origHandler = set_error_handler(array($this, 'errorHandler'));
  }

  public function errorHandler($errno, $errstr, $errfile, $errline)
  {
    if (opIgnoreKnownErrors::isMatch($errno, $errstr, $errfile, $errline))
    {
      return true;
    }

    if (null === $this->origHandler)
    {
      return false;
    }

    return call_user_func($this->origHandler, $errno, $errstr, $errfile, $errline);
  }
}
