<?php

namespace App\Models;

use App\Enums\RequestStatus;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use Filterable;

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
