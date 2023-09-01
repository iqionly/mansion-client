<?php

namespace Iqionly\MansionClient\Exceptions;

use Exception;

class RequiredMansionClientKey extends Exception { 
    protected $message = "Missing environment MANSION_CLIENT_SECRET";
}