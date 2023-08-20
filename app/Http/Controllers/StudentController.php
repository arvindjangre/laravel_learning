<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function upload(Request $request) {
        $fileName = time(). "-ws." . $request->file('image')->getClientOriginalExtension();
        echo $request->file('image') ->storeAs('uploads', $fileName);
    }
}
