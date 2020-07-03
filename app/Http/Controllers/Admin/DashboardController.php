<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(empty($request->filter)){
            $data = [];
        }

        if($request->filter == "Daily"){            
            $orders = Order::whereBetween('date', [$request->start_date, $request->end_date])->get()->groupBy('date');
            if($orders->count() > 0){
                foreach($orders as $date => $order){
                    $dates[] = $date;
                    $sales[] = $order->sum('total_sales');
                }

                $chartjs = app()->chartjs
                ->name('barChartTest')
                ->type('bar')
                ->size(['width' => 400, 'height' => 200])
                ->labels($dates)
                ->datasets([
                    [
                        "label" => "Daily Orders",
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'data' => $sales
                    ]
                ])
                ->options([]);

                $data['chartjs'] = $chartjs;
            }

            $data["total_sales"] = Order::whereBetween('date', [$request->start_date, $request->end_date])->get()->sum('total_sales');
            $data["prev_total_sales"] = Order::whereBetween('date', [date_create($request->start_date)->modify("- 1 Year"), date_create($request->end_date)->modify("- 1 Year")])->get()->sum('total_sales');
            $data["total_order"] = Order::whereBetween('date', [$request->start_date, $request->end_date])->get()->count();
            $data["prev_total_order"] = Order::whereBetween('date', [date_create($request->start_date)->modify("- 1 Year"), date_create($request->end_date)->modify("- 1 Year")])->get()->count();
            $data["total_customer"] = Customer::whereBetween('created_at', [$request->start_date, $request->end_date])->get()->count();
            $data["prev_total_customer"] = Customer::whereBetween('created_at', [date_create($request->start_date)->modify("- 1 Year"), date_create($request->end_date)->modify("- 1 Year")])->get()->count();
            $data["orders"] = Order::take('10')->get();
            
            $data['select_filter'] = $request->daily;
            $data['filter'] = $request->filter;
            $data['filter_text'] = $request->start_date." s/d ".$request->end_date;
        }        

        if($request->filter == "Monthly"){
            $orders = Order::where('date','like','%'.$request->month.'%')
            ->get()
            ->groupBy(function($month) {
                return Carbon::parse($month->date)->format('Y-m-d');
            });

            if($orders->count() > 0){
                foreach($orders as $date => $order){
                    $dates[] = $date;
                    $sales[] = $order->sum('total_sales');
                }

                $chartjs = app()->chartjs
                ->name('barChartTest')
                ->type('bar')
                ->size(['width' => 400, 'height' => 200])
                ->labels($dates)
                ->datasets([
                    [
                        "label" => "Monthly Orders",
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'data' => $sales
                    ]
                ])
                ->options([]);

                $data['chartjs'] = $chartjs;
            }
            
            $data["total_sales"] = Order::where('date','like','%'.$request->month.'%')->get()->sum('total_sales');
            $data["prev_total_sales"] = Order::where('date', date_create($request->month)->modify("- 1 Year"))->get()->sum('total_sales');
            $data["total_order"] = Order::where('date','like','%'.$request->month.'%')->get()->count();
            $data["prev_total_order"] = Order::where('date', date_create($request->month)->modify("- 1 Year"))->get()->count();
            $data["total_customer"] = Customer::where('created_at', $request->month)->get()->count();
            $data["prev_total_customer"] = Customer::where('created_at', date_create($request->month)->modify("- 1 Year"))->get()->count();
            $data["orders"] = Order::take('10')->get();

            $data['filter'] = $request->filter;
            $data['filter_text'] = "Bulan ".date("F",strtotime($request->month));
            $data['select_filter'] = $request->month;
        }

        if($request->filter == "Yearly"){
            $orders = Order::where('date','like','%'.$request->year.'%')
            ->get()
            ->groupBy(function($month) {
                return Carbon::parse($month->date)->format('Y-m');
            });
            
            if($orders->count() > 0){
                foreach($orders as $date => $order){
                    $dates[] = $date;
                    $sales[] = $order->sum('total_sales');
                }

                $chartjs = app()->chartjs
                ->name('barChartTest')
                ->type('bar')
                ->size(['width' => 400, 'height' => 200])
                ->labels($dates)
                ->datasets([
                    [
                        "label" => "Yearly Orders",
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'data' => $sales
                    ]
                ])
                ->options([]);

                $data['chartjs'] = $chartjs;
            }

            $data["total_sales"] = Order::where('date','like','%'.$request->year.'%')->get()->sum('total_sales');
            $data["prev_total_sales"] = Order::where('date', date_create($request->year)->modify("- 1 Year"))->get()->sum('total_sales');
            $data["total_order"] = Order::where('date','like','%'.$request->year.'%')->get()->count();
            $data["prev_total_order"] = Order::where('date', date_create($request->year)->modify("- 1 Year"))->get()->count();
            $data["total_customer"] = Customer::where('created_at', $request->year)->get()->count();
            $data["prev_total_customer"] = Customer::where('created_at', date_create($request->year)->modify("- 1 Year"))->get()->count();
            $data["orders"] = Order::take('10')->get();

            $data['filter'] = $request->filter;
            $data['filter_text'] = "Tahun ".$request->year;
            $data['select_filter'] = $request->year;
        }

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
