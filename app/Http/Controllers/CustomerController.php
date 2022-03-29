<?php

namespace App\Http\Controllers;

use App\Imports\CustomerImport;
use App\Models\Customer;
use App\QueryFilters\Branch;
use App\QueryFilters\Gender;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pipline = app(Pipeline::class)
                    ->send(Customer::query())
                    ->through([
                        Branch::class,
                        Gender::class
                    ])
                    ->thenReturn();


        $male_pipline = app(Pipeline::class)
            ->send(Customer::query())
            ->through([
                Branch::class,
                Gender::class
            ])
            ->thenReturn();

        $female_pipline = app(Pipeline::class)
            ->send(Customer::query())
            ->through([
                Branch::class,
                Gender::class
            ])
            ->thenReturn();




        return ["customers" => $pipline->latest()->paginate(20), "meta_data" => [
            "total_customer" => $pipline->latest()->paginate(20)->total(),
            "total_male_customer" => $male_pipline->where('gender', 'M')->count(),
            "total_female_customer" => $female_pipline->where('gender', 'F')->count(),
        ]];





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }


    public function import(Request $request)
    {
        Excel::import(new CustomerImport(), request()->file('csv'));
        return back()->with('success', "Import is in processing...");

    }
}
