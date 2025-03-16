<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;


use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        $id = $this->route('postid');
        return [
            'title' => [
                'required',
                'min:3',
                Rule::unique('posts')->ignore($id),
            ],
            'description' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',

        ];
    }
}
