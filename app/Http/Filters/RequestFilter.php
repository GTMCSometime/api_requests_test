<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class RequestFilter extends AbstractFilter
{
    public const MESSAGE = 'message';
    public const DATE = 'created_at';


    protected function getCallbacks(): array
    {
        return [
            self::MESSAGE => [$this, 'message'],
            self::DATE => [$this, 'created_at'],
        ];
    }

    public function message(Builder $builder, $value)
    {
        $builder->where('message', 'like', "%{$value}%");
    }

    protected function date(Builder $builder, $value) 
    {
        $builder->whereBetween('created_at', [$value['min'], $value['max']]);
    }
    

}