<?php


namespace App\QueryFilters;


use Closure;



class Branch
{

    public function handle($request, Closure $next)
    {
        if(!request()->has('branch')) {
            return $next($request);
        }

        $builder = $next($request);

        return $builder->where('branch_id', request()->branch);


    }

}