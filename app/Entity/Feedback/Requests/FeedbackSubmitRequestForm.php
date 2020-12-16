<?php

namespace App\Entity\Feedback\Requests;

use App\Entity\Feedback\FeedbackCreateDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class FeedbackSubmitRequestForm extends FormRequest
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
            'email' => 'nullable|email',
            'phone' => 'required|min:10',
            'message' => 'nullable|string|max:500',
        ];
    }

    public function getDto(): FeedbackCreateDto
    {
      return new FeedbackCreateDto($this->name, $this->email, $this->phone, $this->message, '');
    }
}