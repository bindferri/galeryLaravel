<?php

namespace Api\Galery\Requests;

use Illuminate\Validation\Rule;
use Infrastructure\Abstracts\ApiRequest;

class CreateGaleryRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image',
            'users_id' => [Rule::exists('users','id')]
        ];
    }
}
