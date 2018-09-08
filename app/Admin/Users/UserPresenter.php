<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 11/04/2018
 * Time: 21:10
 */

namespace App\General\Users;

use Laracasts\Presenter\Presenter;

class userPresenter extends Presenter
{
    public function fullName()
    {
        return $this->firstname . " " . $this->lastname;
    }

    public function getSsoDetails()
    {
        return [
            'email' => $this->email,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'designation' => $this->designation
        ];
    }
}
