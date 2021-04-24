<?php

namespace App\Services;

use App\Models\Lecturer;
use App\Models\LecturerEducation;
use App\Models\LecturerExperience;
use App\Models\LecturerPublication;
use App\Services\Traits\FileHandler;

class LecturerService
{
    use FileHandler;

    protected $model;

    public function __construct(Lecturer $model)
    {
        $this->model = $model;
    }

    public function createLecturer(): LecturerService
    {
        $this->model = $this->model->query()
            ->create($this->basicDataFiles());

        return $this;
    }

    public function basicDataFiles(): array
    {
        $lecturer = request()->input('basic');
        $lecturer['avatar'] = $this->storeFile(request()->file('basic')['avatar']);
        $lecturer['nid'] = $this->storeFile(request()->file('basic')['nid'], 'nid');
        return $lecturer;
    }

    public function attachEducations(): LecturerService
    {
        $educations = $this->addLecturer(request()->input('educations'));

        LecturerEducation::query()->insert($educations);

        return $this;
    }

    public function attachPublications(): LecturerService
    {
        $publications = $this->addLecturer(request()->input('publications'));

        LecturerPublication::query()->insert($publications);

        return $this;
    }

    public function attachExperiences(): LecturerService
    {
        $experiences = $this->addLecturer(request()->input('experiences'));

        LecturerExperience::query()->insert($experiences);

        return $this;
    }

    private function addLecturer($data): array
    {
        return collect($data)
            ->map(function ($item) {
                $item['lecturer_id'] = $this->model->id;
                return $item;
            })->toArray();
    }
}
