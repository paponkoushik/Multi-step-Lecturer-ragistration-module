<?php


namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Services\LecturerService;
use Illuminate\Http\Request;


class LecturerRegistration extends Controller
{
    Private $service;

    public function __construct(LecturerService $service)
    {
        $this->service = $service;
    }

    public function lecturerView()
    {
        return view('lecturer_registration');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        dd(filled($request->input('pro')['publications']));
        $this->service->store();
        $this->service->attachEducations();
//        $lecturer = Lecturer::query()->create($request->input('basic'));
//        dd($lecturer);
    }
}
