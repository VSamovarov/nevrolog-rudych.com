<?php

namespace App\Entity\Feedback\Requests;

use App\Entity\Feedback\FeedbackCreateDto;
use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequestForm extends FormRequest
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
            'name' => 'required|string|min:4',
            'created_at' => 'date',
            'email' => 'nullable|email',
            'phone' => 'nullable|min:10',
        ];
    }

    public function getDto(): FeedbackCreateDto
    {
        return new FeedbackCreateDto($this->name, $this->email, $this->phone, $this->message, $this->created_at);
    }
}