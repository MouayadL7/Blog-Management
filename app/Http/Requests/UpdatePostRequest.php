<?php

namespace App\Http\Requests;

use App\DTOs\PostDTO;
use App\Helpers\ResponseHelper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    
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
            'title' => ['sometimes', 'string', 'max:255'],
            'content' => ['sometimes', 'string'],
            'publish' => ['sometimes', 'boolean']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return ResponseHelper::sendError('Validation error', 422, $validator->errors())->throwResponse();
    }

    public function toDTO(): PostDTO
    {
        return PostDTO::fromRequest($this);
    }
}
