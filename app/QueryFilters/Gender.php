<?php


namespace App\QueryFilters;


use Closure;



class Gender
{

    public function handle($request, Closure $next)
    {
        if(!request()->has('gender')) {
            return $next($request);
        }
        $builder = $next($request);
        return $builder->where('gender', request()->gender);
    }

}