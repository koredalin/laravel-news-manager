<?php

namespace App\Exceptions;

/**
 * Description of SerializationException
 *
 * @author H1
 */
class SerializationException extends \Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, Throwable $previous = null) {
        $message = __CLASS__ . ': ' . $message;

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }
}
