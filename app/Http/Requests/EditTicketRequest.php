<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Ticket;
use Auth;

class EditTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		$ticketId = $this->route('id');
        return auth()->check() && Ticket::where("id", $ticketId)->where("user_id", auth()->id())->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|max:100',
            'text'=>'required|max:500',
        ];
    }
    
    public function messages()
	{
		return [
			'title.required' => 'Требуется ввод заголовка',
			'text.required' => 'Требуется ввод текста',
		];
	}
}
