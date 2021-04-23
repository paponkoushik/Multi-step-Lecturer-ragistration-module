<?php

namespace App\Services;

use App\Models\Lecturer;
use App\Models\LecturerEducation;

class LecturerService
{
    Private $model;

    public function __construct(Lecturer $model)
    {
        $this->model = $model;
    }

    public function store(): LecturerService
    {
        $this->model = $this->model->query()
            ->create(request()->input('basic'));

        return $this;
    }

    public function attachEducations(): LecturerService
    {
        $educations = collect(request()->input('pro')['educations'])
            ->map(fn ($item) => array_merge(['lecturer_id' => $this->model->id], $item))
            ->toArray();

        LecturerEducation::query()->insert($educations);

        return $this;
    }
}
