<?php

namespace App\Rules\Entidad;

use Illuminate\Contracts\Validation\Rule;

class Ruc implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (isset($value)){
            $valueLength = strlen($value);
            if (($valueLength < 7))  return false;

            $posicionCoincidencia = strpos($value, "-");
            $coincidencias = substr_count($value,"-", $valueLength - 3);
            
            return  ($coincidencias === 1) &&  
                    ($valueLength < 20) && 
                    ($posicionCoincidencia == $valueLength - 2);
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El RUC no es correcto(Verifque longitud y dígito verificador)';
    }
}
