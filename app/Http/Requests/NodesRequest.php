<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NodesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:nodes|max:255',
            'system_uptime' => 'required',
            'allocated_disk' => 'required',
            'total_disk' => 'required',
            'allocated_ram' => 'required',
            'total_ram' => 'required',
        ];
    }


}
