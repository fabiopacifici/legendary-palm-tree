<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //dd($this->project);
        return [
            //'name' => 'required|unique:projects,name,except,' . $this->project,
            'name' => ['required', Rule::unique('projects')->ignore($this->project?->id)],
            'cover_image' => 'nullable|image|max:500',
            'project_url' => 'nullable',
            'source_code_url' => 'nullable',
            'description' => 'nullable'
        ];
    }
}
