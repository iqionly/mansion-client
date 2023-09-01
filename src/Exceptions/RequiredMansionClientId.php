<?php

namespace Iqionly\MansionClient\Exceptions;

use Exception;

class RequiredMansionClientId extends Exception { 
    protected $message = "Missing environment MANSION_CLIENT_ID";
}