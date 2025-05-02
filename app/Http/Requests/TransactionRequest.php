<?php

namespace App\Http\Requests;

use App\Enums\TransactionTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
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
            'transaction_type' => [
                'required',
                Rule::in(array_column(TransactionTypes::types(), 'value')),
            ],
            'amount' => ['required', 'numeric', 'min:0'],
            'reference' => ['required', 'string', 'max:255'],
            'balance_after' => ['numeric'],
        ];
    }
}
