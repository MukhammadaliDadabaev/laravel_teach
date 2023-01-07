<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePostRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'title' => 'Sarlavha',
            'short_content' => 'Qisqacha mazmuni',
            'content' => 'Maqola',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //---> 1-usul TEKSHIRISH
        // return Gate::authorize('create-post', Role::find(1));

        //---> 2-usul TEKSHIRISH
        // return Gate::authorize('create-post', Role::where('name', 'admin')->first());
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'short_content' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image|max:2048',
        ];
    }
}
