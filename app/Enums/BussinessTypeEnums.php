<?php

namespace App\Enums;

enum  BussinessTypeEnums: int
{
    case Resturant = 1;
 

    public function getIntendedDashboard(){
        return match($this){
            self::Resturant => 'resturant';
        }
    }
}
