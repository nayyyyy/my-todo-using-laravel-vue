<?php
declare(strict_types=1);

namespace App\Http\Requests\Feature;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $title
 * @property mixed $desc
 */
class TodoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'desc' => ['required'],
            'priority' => ['required', 'in:1,2,3', 'numeric'],
            'start' => ['required'],
            'end' => ['required']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'title' => ucwords($this->title),
            'desc' => ucfirst($this->desc)
        ]);
    }
}
