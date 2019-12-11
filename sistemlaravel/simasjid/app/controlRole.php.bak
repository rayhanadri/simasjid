<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class controlRole 
{
    public static function checkRole($userRole, $arrayRole)
    {
        if (in_array($userRole, $arrayRole)) {
            return false;
        }
        return true;
    }

    public static function redirectFalse($result)
    {
        if ($result == false) {
            return redirect(route('home'));
        }
    }
}
