<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\RequestStatus;
use App\Traits\Filterable;

class Request extends Model
{
    use Filterable, HasFactory;

    protected $table = 'requests';
    protected $guard = false;

    protected $fillable = [
        'name',
        'email',
        'type',
        'message',
        'comment',
    ];
    
    protected $casts = [
        'status' => RequestStatus::class,
    ];

}
