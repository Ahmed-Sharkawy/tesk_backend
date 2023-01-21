<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title'   => 'required|regex:/^[a-zA-Z\s]+$/|max:255|unique:posts,title,' . $this->post->id,
            'author'  => 'required|string',
            'content' => 'required|string|min:20',
            'image'   => 'image|mimes:png,jpg,webp|max:2000',
            'user_id' => 'required|integer|numeric',
        ];
    }
}
