<?php

namespace App\Http\Controllers;

use App\Mail\WinnerEmail;
use App\Models\Customer;
use App\Models\Winner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function thank()
    {
        return view('thank-you');
    }

    public function createStepOne()
    {
        return view('steps.step-one');
    }

    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate(
            [
                'email' => 'required|email|unique:customers|max:255',
                'name' => 'required|max:255',
                'l_name' => 'required|max:255',
                'q3' => 'max:255',
            ],
            [
                'l_name.required' => 'The last name field is required.',
                'l_name.max:255' => 'The last name must not be greater than 2 characters.',
                'q3.required' => 'The question 3 field is required.',
                'q3.max:255' => 'The question 3 must not be greater than 2 characters.'
            ]
        );

        if(empty($request->session()->get('customer'))){
            $customer = new Customer();
            $customer->fill($validatedData);
            $request->session()->put('customer', $customer);
        }else{
            $customer = $request->session()->get('customer');
            $customer->fill($validatedData);
            $request->session()->put('customer', $customer);
        }

        $request->session()->put('step', '2');

        return redirect()->route('steps.step.two');
    }

    public function createStepTwo()
    {
        $current_step = $this->getCurrentPage('2');
        if($current_step !== ''){
            return $current_step;
        } else {
            return view('steps.step-two');
        }
    }

    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'q4' => 'required',
            'q5' => 'required',
        ]);

        $customer = $request->session()->get('customer');
        $customer->fill($validatedData);
        $request->session()->put('customer', $customer);

        $request->session()->put('step', '3');

        return redirect()->route('steps.step.three');
    }

    public function createStepThree()
    {
        $current_step = $this->getCurrentPage('3');
        if($current_step !== ''){
            return $current_step;
        } else {
            return view('steps.step-three');
        }
    }

    public function postCreateStepThree(Request $request)
    {
        $validatedData = $request->validate([
            'q6' => 'required',
        ]);

        $customer = $request->session()->get('customer');
        $customer->fill($validatedData);
        $customer->save();

        $request->session()->forget('customer');
        $request->session()->forget('step');

        return redirect()->route('thank');
    }

    protected function getCurrentPage($current_page_step = '1')
    {
        $action = '';
        $current_step = session('step');
        $redirect = redirect()->route('steps.step.one');
        switch ($current_step) {
            case null:
                $redirect = redirect()->route('steps.step.one');
                break;
            case '2':
                $redirect = redirect()->route('steps.step.two');
                break;
            case '3':
                $redirect = redirect()->route('steps.step.three');
                break;
        }

        if( $current_step != $current_page_step ) {
            $action = $redirect;
        }

        return $action;
    }

    public function adminAllCustomers()
    {
        $customers = Customer::get();
        $winner = Winner::first();

        return view('admin.customers.index', [
            'customers' => $customers,
            'winner' => $winner
        ]);
    }

    public function adminShowCustomer(Customer $customer)
    {
        return view('admin.customers.show', [
            'customer' => $customer
        ]);
    }

    public function adminChooseWinner()
    {
        $customer = Customer::inRandomOrder()->first();
        $objMail = new \stdClass();
        $objMail->receiver = $customer->name . ' ' . $customer->l_name;

        Winner::truncate();
        Winner::create(['customer_id' => $customer->id]);

        Mail::to($customer->email)->send(new WinnerEmail($objMail));
        return back()->with('status', 'Winner: ' . $customer->email);
    }

    public function adminResetWinner()
    {
        Winner::truncate();
        return back();
    }

    public function adminResetCustomers()
    {
        Customer::query()->delete();
        return back();
    }
}
