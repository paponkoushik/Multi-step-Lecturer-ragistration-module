<?php


namespace App\Http\Controllers;

use App\Services\LecturerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LecturerRegistrationController extends Controller
{
    protected $service;

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
        DB::transaction(fn() => $this->service
            ->createLecturer()
            ->attachEducations()
            ->attachExperiences()
            ->attachPublications()
        );
        
    }
}
