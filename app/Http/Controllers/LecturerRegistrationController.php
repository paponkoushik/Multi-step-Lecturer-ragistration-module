<?php


namespace App\Http\Controllers;

use App\Services\LecturerService;
use Illuminate\Http\JsonResponse;
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

    public function store(Request $request): JsonResponse
    {
        DB::transaction(fn() => $this->service
            ->validate()
            ->createLecturer()
            ->attachEducations()
            ->attachExperiences()
            ->attachPublications()
        );

        return response()->json(['message' => 'Data has been stored successfully']);
    }
}
