<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LecturerRegistration extends Controller
{
    public function lecturerView()
    {
        return view('lecturer_registration');
    }

    public function store(Request $request)
    {
        $basicInfo = $request->only('basic');
        dd($basicInfo);
    }
}
