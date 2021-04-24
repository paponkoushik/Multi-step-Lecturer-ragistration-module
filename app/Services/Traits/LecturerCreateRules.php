<?php


namespace App\Services\Traits;


trait LecturerCreateRules
{
    public function lecturerCreateRules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:lecturers,email',
            'avatar' => 'nullable|image|mimes:png|max:2048',
            'nid' => 'nullable|image|mimes:png|max:2048',
        ];
    }

    public function lecturerEducationRules(): array
    {
        return [
            'institute_name' => 'required',
            'qualification' => 'required',
            'result' => 'nullable',
        ];
    }

    public function lecturerExperienceRules(): array
    {
        return [
            'institute_name' => 'required',
            'designation' => 'required',
            'description' => 'nullable|max:1000',
        ];
    }

    public function lecturerPublicationRules(): array
    {
        return [
            'title' => 'required',
            'link' => 'nullable|url',
            'description' => 'nullable|max:1000',
        ];
    }
}
