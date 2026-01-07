<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        // dd($this->route(),$this->routeIs('task.store')); // dump and die to see all request data
        return [
            // 'title' => 'required|string|max:255|unique:tasks,title,'.$this->id,
            'title' => 'required|string|max:255|unique:tasks,title,' . $this->id,
            'description' => 'required|string',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            'image' =>
             $this->routeIs('task.store')
            ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function storeOrUpdate(){
        return $this->routeIs('task.store') ? 'store' : 'update';
    }

    
}
