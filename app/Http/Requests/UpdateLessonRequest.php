<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
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
        return [
            'title' => 'sometimes|string|max:255',
            'chapter_id' => 'sometimes|exists:chapters,id',
            'is_free_preview' => 'sometimes|boolean',
            'duration' => 'sometimes|string',
            'video' => 'sometimes|string',
            'description' => 'sometimes|string',
            'sort_order' => 'sometimes|integer',
            'status' => 'sometimes|string',
        ];
    }
}
