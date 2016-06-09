<?php

class opWebDebugLoggerIgnoreKnownErrors extends sfWebDebugLogger
{
  public function handlePhpError($errno, $errstr, $errfile, $errline, $errcontext = array())
  {
    if (opIgnoreKnownErrors::isMatch($errno, $errstr, $errfile, $errline))
    {
      return true;
    }

    return parent::handlePhpError($errno, $errstr, $errfile, $errline, $errcontext);
  }
}
