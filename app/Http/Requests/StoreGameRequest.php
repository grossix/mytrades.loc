<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreGameRequest extends Request
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gameid' => 'required|integer',
            'name' => 'required',
            'link' => 'required|url',
            'image' => 'required|url'
        ];
    }
}
