<?php

namespace App\Http\Requests\Post;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class   StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(),
            'slug'    => Str::slug($this->title),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'   => 'required|unique:posts,title|max:255|regex:/^[a-zA-Z\s]+$/',
            'author'  => 'required|string',
            'content' => 'required|string|min:20',
            'image'   => 'required|image|mimes:png,jpg,webp|max:2000',
            'user_id' => 'required|integer|numeric',
            'slug'    => 'nullable|string|unique:posts,slug'
        ];
    }
}
