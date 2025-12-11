<?php

namespace App\Providers;

use App\Area;
use App\Bankbook;
use App\Banks;
use App\Billing;
use App\BillMonth;
use App\Cashbook;
use App\ComplainBox;
use App\CustomerCategory;
use App\Customers;
use App\CustomerTransaction;
use App\Employee;
use App\EmployeeTransaction;
use App\InOutCategory;
use App\InOutTransaction;
use App\Package;
use App\Salary;
use App\SalaryMonth;
use App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //###################------###########################
        Area::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Area::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        Bankbook::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Bankbook::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        Banks::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Banks::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        Billing::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Billing::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        BillMonth::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        BillMonth::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        Cashbook::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Cashbook::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        CustomerCategory::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        CustomerCategory::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        Customers::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Customers::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        CustomerTransaction::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        CustomerTransaction::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        Employee::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Employee::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        EmployeeTransaction::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        EmployeeTransaction::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        InOutCategory::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        InOutCategory::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        InOutTransaction::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        InOutTransaction::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        Package::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Package::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        Salary::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Salary::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        SalaryMonth::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        SalaryMonth::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        Services::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Services::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

        //###################------###########################
        ComplainBox::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        ComplainBox::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //###################################################

    }
}
