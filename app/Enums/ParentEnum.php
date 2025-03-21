<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


class ParentEnum extends Enum
{

    const STATUS = [
        'Active' => 'Активна',
        'Resolved' => 'В работе',

    ];


}
