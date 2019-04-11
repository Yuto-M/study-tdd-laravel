<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCustomers()
    {
        return response()->json(
            \App\Customer::query()->select(['id', 'name'])->get()
        );
    }

    public function postCustomer(Request $request)
    {
        $this->validate($request, ['name' => 'required']);
        $customer = new \App\Customer();
        $customer->name = $request->json('name');
        $customer->save();
    }

    public function getCustomer()
    {

    }

    public function putCustomer()
    {

    }

    public function deleteCustomer()
    {

    }

    public function getReports()
    {

    }

    public function postReport()
    {

    }

    public function getReport()
    {

    }

    public function putReport()
    {

    }

    public function deleteReport()
    {

    }
}
