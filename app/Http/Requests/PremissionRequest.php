<?php

namespace App\Http\Requests;

use App\Rules\PolicyRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PremissionRequest extends FormRequest
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
            'policy' => ['required', 'string', new PolicyRule],
            'view_any' => ['boolean'],
            'view_trashed' => ['boolean'],
            'view' => ['boolean'],
            'create' => ['boolean'],
            'update' => ['boolean'],
            'delete' => ['boolean'],
            'restore' => ['boolean'],
            'force_delete' => ['boolean'],
        ];
    }
}
