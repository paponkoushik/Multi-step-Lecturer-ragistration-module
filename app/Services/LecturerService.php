<?php

namespace App\Services;

use App\Models\Lecturer;
use App\Models\LecturerEducation;
use App\Models\LecturerExperience;
use App\Models\LecturerPublication;
use App\Services\Traits\FileHandler;
use App\Services\Traits\LecturerCreateRules;

class LecturerService
{
    use FileHandler, LecturerCreateRules;

    protected $model;

    public function __construct(Lecturer $model)
    {
        $this->model = $model;
    }

    public function validate(): LecturerService
    {
        $this->checkValid(request()->input('basic'), $this->lecturerCreateRules());
        $this->checkValid(request()->input('educations')[0], $this->lecturerEducationRules());
        $this->checkValid(request()->input('experiences')[0], $this->lecturerExperienceRules());
        $this->checkValid(request()->input('publications')[0], $this->lecturerPublicationRules());

        return $this;
    }

    public function checkValid(array $array, array $rules)
    {
        validator(
            $array,
            $rules,
        )->validate();
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

        $lecturer['avatar'] = request()->basic['avatar'] ? $this->storeFile(request()->file('basic')['avatar']) : null;

        $lecturer['nid'] = request()->basic['nid'] ? $this->storeFile(request()->file('basic')['nid'], 'nid') : null;

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
