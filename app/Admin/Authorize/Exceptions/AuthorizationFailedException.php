<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 31/05/2018
 * Time: 11:34
 */

namespace App\General\Authorize\Exceptions;

class AuthorizationFailedException extends \Exception
{
    /**
     * Construct the exception
     */
    public function __construct($message)
    {
        $message = "Access Denied: You cannot ". strtolower($message);

        parent::__construct($message);
    }
}
