<?php

namespace Iqionly\MansionClient\Exceptions;

use Exception;

class RequiredMansionUrl extends Exception { 
    protected $message = "Missing environment MANSION_URL";
}