<?php

namespace App\Models;

use App\Enums\RequestStatus;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{

    protected $table = 'applications';
    protected $guard = false;

    protected $fillable = [
        'name',
        'email',
        'status',
        'message',
        'comment',
    ];
    
    protected $casts = [
        'status' => RequestStatus::class,
    ];
}
