<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data["total_sales"] = Order::whereBetween('date', [$request->start_date, $request->end_date])->get()->sum('total_sales');
        $data["prev_total_sales"] = Order::whereBetween('date', [date_create($request->start_date)->modify("- 1 Year"), date_create($request->end_date)->modify("- 1 Year")])->get()->sum('total_sales');
        $data["total_order"] = Order::whereBetween('date', [$request->start_date, $request->end_date])->get()->count();
        $data["prev_total_order"] = Order::whereBetween('date', [date_create($request->start_date)->modify("- 1 Year"), date_create($request->end_date)->modify("- 1 Year")])->get()->count();
        $data["total_customer"] = Customer::whereBetween('created_at', [$request->start_date, $request->end_date])->get()->count();
        $data["prev_total_customer"] = Customer::whereBetween('created_at', [date_create($request->start_date)->modify("- 1 Year"), date_create($request->end_date)->modify("- 1 Year")])->get()->count();
        $data["orders"] = Order::take('10')->get();
        return view('admin.dashboard.index',$data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
