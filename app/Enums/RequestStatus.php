<?php declare(strict_types=1);

namespace App\Enums;


enum RequestStatus: string
{

    case Active = 'Active';
    case Resolved = 'Resolved';


    public static function getStatus(RequestStatus $enum) : string 
    {
        return match($enum) {
            RequestStatus::Active => 'Active',
            RequestStatus::Resolved => 'Resolved',
            default => '',
        };
    }



}
