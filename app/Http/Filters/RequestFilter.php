<?php


namespace App\Http\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class RequestFilter extends AbstractFilter
{
    public const TYPE = 'type';
    public const DATE = 'created_at';


    protected function getCallbacks(): array
    {
        return [
            self::TYPE => [$this, 'type'],
            self::DATE => [$this, 'created_at'],
        ];
    }

    public function type(Builder $builder, $value)
    {
        $builder->where('type',  $value);
    }

    protected function created_at(Builder $builder, $value) 
    {
        $builder->whereDate('created_at', new Carbon($value));
    }
    

}