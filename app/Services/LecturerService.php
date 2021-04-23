<?php

namespace App\Services;

use App\Models\Lecturer;
use App\Models\LecturerEducation;
use App\Models\LecturerExperience;
use App\Models\LecturerPublication;

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
        $educations = $this->addLecturer(collect(request()->input('pro')['educations']));

        LecturerEducation::query()->insert($educations);

        return $this;
    }

    public function attachPublications(): LecturerService
    {
        $publications = $this->addLecturer(collect(request()->input('pro')['publications']));

        LecturerPublication::query()->insert($publications);

        return $this;
    }

    public function attachExperiences(): LecturerService
    {
        $experiences = $this->addLecturer(collect(request()->input('pro')['educations']));

        LecturerExperience::query()->insert($experiences);

        return $this;
    }

    private function addLecturer($collection)
    {
        return $collection
            ->map(function ($item) {
                $item['lecturer_id'] = $this->model->id;
                return $item;
            })->toArray();
    }
}
