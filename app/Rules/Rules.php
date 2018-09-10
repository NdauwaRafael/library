<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 09/09/2018
 * Time: 22:01
 */

namespace App\Rules;


use Illuminate\Support\Facades\Validator;

trait Rules
{
    public function verdict($request, $rules, $messages = [])
    {
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $validator;
        }
    }
}
