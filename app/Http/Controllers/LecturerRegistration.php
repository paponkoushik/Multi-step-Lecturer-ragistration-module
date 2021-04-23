<?php


namespace App\Http\Controllers;

use App\Services\LecturerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LecturerRegistration extends Controller
{
    Private $service;

    public function __construct(LecturerService $service)
    {
        $this->service = $service;
    }

    public function create()
    {
        return view('lecturer_registration');
    }

    public function store(Request $request)
    {
        $lecturer = DB::transaction(fn() => $this->service
            ->createLecturer()
            ->attachEducations()
            ->attachExperiences()
            ->attachPublications()
        );

////        dd($request->all());
//        dd(filled($request->input('pro')['publications']));
//        $this->service->store();
//        $this->service->attachEducations();
////        $lecturer = Lecturer::query()->create($request->input('basic'));
////        dd($lecturer);
    }
}
