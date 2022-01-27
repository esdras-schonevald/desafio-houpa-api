<?php

namespace Adapters;

use Exception;

class AdapterException extends Exception
{
   function __construct(string $message, int $code)
    {   parent::__construct($message, $code);
    }

}