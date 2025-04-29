<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClotheRequest extends FormRequest
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
        'name'=> 'required|string|max:255',
        'description'=> 'required|string|max:1000',
        'size'=> 'required|string|max:50',
        'color'=> 'required|string|max:50',
        'price'=> 'required|numeric|min:0',
        'cover'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.string' => 'Il nome deve essere una stringa',
            'name.max' => 'Il nome non deve superare i 255 caratteri',
            'description.required' => 'La descrizione è obbligatoria',
            'description.string' => 'La descrizione deve essere una stringa',
            'description.max' => 'La descrizione non deve superare i 1000 caratteri',
            'size.required' => 'La taglia è obbligatoria',
            'size.string' => 'La taglia deve essere una stringa',
            'size.max' => 'La taglia non deve superare i 50 caratteri',
            'color.required' => 'Il colore è obbligatorio',
            'color.string' => 'Il colore deve essere una stringa',
            'color.max' => 'Il colore non deve superare i 50 caratteri',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.numeric' => 'Il prezzo deve essere un valore numerico',
            'price.min' => 'Il prezzo deve essere almeno 0',
            'cover.required' => 'L\'immagine di copertina è obbligatoria',
            'cover.image' => 'Il file deve essere un\'immagine',
            'cover.mimes' => 'Il file deve essere in uno dei seguenti formati: jpeg, png, jpg, gif',
            'cover.max' => 'Il file non deve superare i 2MB',
        ];
    }
}
