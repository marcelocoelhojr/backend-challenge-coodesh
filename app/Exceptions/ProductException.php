<?php

namespace App\Exceptions;

use Exception;

class ProductException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @param  array  $errors
     * @return void
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }
}
