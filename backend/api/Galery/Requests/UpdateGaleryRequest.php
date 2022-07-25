<?php

namespace Api\Galery\Requests;

use Illuminate\Validation\Rule;
use Infrastructure\Abstracts\ApiRequest;

class UpdateGaleryRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'title' => 'filled|string|max:255',
            'description' => 'filled|string',
            'image' => 'filled|image',
            'users_id' => ['filled',Rule::exists('users','id')]
        ];
    }
}
