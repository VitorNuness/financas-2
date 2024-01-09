<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreUpdateAccountRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'min:3', 'max:50', Rule::unique('accounts')->where('user_id', Auth::user()->id)],
            'bank' => ['required', 'min:3', 'max:50'],
            'type' => ['required'],
            'balance' => ['nullable', 'decimal:2'],
            'due_date' => ['nullable', 'integer'],
        ];

        if ($this->method() === 'PUT') {
            $rules['name'] = [
                'required',
                'min:3',
                'max:50',
                Rule::unique('accounts')->ignore($this->id)->where('user_id', Auth::user()->id),
            ];
        }

        return $rules;
    }
}