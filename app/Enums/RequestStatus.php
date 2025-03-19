<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


final class RequestStatus extends Enum
{

    const STATUS = [

        'Active' => 'Активна',

        'Resolved' => 'Решена',

    ];
}
