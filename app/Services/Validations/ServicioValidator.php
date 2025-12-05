<?php

namespace App\Services\Validations;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ServicioValidator
{
    public function validateCreate(array $data)
    {
        $validator = Validator::make($data, [
            'num_sec_proy' => 'required',
            'empresa' => 'required|string|max:80',
            'ubicacion' => 'required|string|max:100',
            'fecha_sol' => 'required|date',
            'items' => 'required|array|min:1',
        ], [
            'items.required' => 'Debe agregar al menos un ensayo.',
            'items.min' => 'Debe agregar al menos un ensayo.'
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}