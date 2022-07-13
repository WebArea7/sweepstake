<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customers = Customer::get()->groupBy(function ($acetone) {
            return $acetone->created_at->toDateString();
        });

        $customers_per_day = [];
        if(!empty($customers)){
            foreach ($customers as $date => $group) {
                $customers_per_day[$date] = count($group);
            }
        }

        return view('admin.dashboard', [
            'customers' => $customers_per_day
        ]);
    }
}
