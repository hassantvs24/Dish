<?php

namespace App\Http\Controllers\Reports;

use App\ComplainBox;
use App\CustomerCategory;
use App\Customers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customers::all();
        $category = CustomerCategory::all();
        $table = ComplainBox::orderBy('complainID', 'DESC')->get();
        return view('reports.customer')->with(['table' => $table, 'customer' => $customer, 'category' => $category]);
    }

    public function show(Request $request){

        $date_rang = date_time_range($request->dateRang);

        $pre_table = ComplainBox::whereBetween('created_at', [$date_rang[0], $date_rang[1]]);
        if($request->filled('customerID')){
            $pre_table->where('customerID', $request->customerID);
        }
        $table = $pre_table->get();

        return view('print.reports.customer.customer')->with(['table' => $table, 'date_rang' =>  $request->dateRang]);
    }


    public function all_customer(Request $request){
        //dd($request->all());
        if (isset($request->customerCatID)){
            $table = Customers::orderBy('name')->where('customerCatID',$request->customerCatID)->get();
        }else{
            $table = Customers::orderBy('name')->get();
        }

        return view('print.reports.customer.customer_list')->with(['table' => $table]);
    }

}
