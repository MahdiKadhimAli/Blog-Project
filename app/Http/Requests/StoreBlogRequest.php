<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'name' => 'required|string',
            'discrimination' => 'required',
            'image' => 'required|mimes:png,jpg',
            'category_id' => 'required|exists:categories,id'
        ];
    }
    //هذه الدالة تعمل على وضع اسماء بديلة عن الاسماء الموجودة في قاعدة البيانات
    public function attributes()
    {
        return [
            'category_id' => 'category',
            'discrimination' => 'description'
        ];
    }
}