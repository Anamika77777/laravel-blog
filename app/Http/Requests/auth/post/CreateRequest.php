<?php 

namespace App\Http\Requests\auth\post;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'file' =>'required|image|mimes:png,jpg',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:3000',
            'status' => 'required|integer',
            'category' => 'required|integer',
            'tags' => 'required|array',
            'tags.*' => 'required|string',
        ];
    }
}