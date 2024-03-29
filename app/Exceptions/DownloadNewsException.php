<?php

namespace App\Exceptions;

use Exception;
use Throwable;

/**
 * Description of DownloadNewsException
 *
 * @author H1
 */
class DownloadNewsException extends Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, Throwable $previous = null)
    {
        $message = __CLASS__ . ': ' . $message;

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }
}
