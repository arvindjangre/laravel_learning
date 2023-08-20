<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function create()
    {
        $url = url('/customer');
        $title = 'Customer Registration';
        $data = compact('url', 'title');
        return view('customer')->with($data);
    }
    public function index()
    {
        return view('customer');
    }

    public function store(Request $request)
    {
        // p($request->all()); die;
        // $request['name'] = "arvind";
        // $request['email'] = "arvid@ar.com";
        $request['gender'] = "M";
        $request['address'] = "adfaf";
        $request['state'] = "karnataka";
        $request['country'] = "india";
        $request['dob'] = date("Y-m-d");
        // $request['password'] = "root";

        $customer = new Customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->state = $request['country'];
        $customer->dob = $request['dob'];
        $customer->password = md5($request['password']);
        $customer->save();

        return redirect('/customer/view');
    }
    public function view(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "") {
            $customer = Customer::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->get();
        } else {
            $customer = Customer::paginate(15);
        }
        $data = compact('customer', 'search');
        return view('customer-view')->with($data);
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }
        return redirect('customer');
    }
    public function forceDelete($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->forceDelete();
        }
        return redirect()->back();
    }
    public function restore($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->restore();
        }
        return redirect('customer');
    }


    public function edit($id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $url = url('/customer/update') . "/" . $id;
            $title = 'Update Customer';
            $data = compact('customer', 'url', 'title');
            return view('customer')->with($data);
        }
        return redirect('customer');
    }

    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        // $customer->address = $request['address'];
        // $customer->state = $request['state'];
        // $customer->state = $request['country'];
        // $customer->dob = $request['dob'];
        $customer->save();

        return redirect('customer');
    }

    public function trash() {
        $customer = Customer::onlyTrashed()->get();
        $data = compact('customer');
        return view('customer-trash')->with($data);
    }
}
