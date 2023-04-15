<?php

namespace App\Exceptions;

use Exception;

class AddressException extends Exception
{
    /**
     * The status code to use for the response.
     *
     * @var int
     */
    public int $status = 400;

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
