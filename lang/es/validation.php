<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El :attribute debe ser aceptado.',
    'accepted_if' => 'El :attribute debe ser aceptado cuando :other es :value.',
    'active_url' => 'El :attribute no es una URL valida.',
    'after' => 'El :attribute must be a date after :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El :attribute debe contener solo letras.',
    'alpha_dash' => 'El :attribute debe contener letras, numeros, guiones y barras bajas.',
    'alpha_num' => 'El :attribute debe contener solo letras y numeros.',
    'array' => 'El :attribute debe ser un array.',
    'before' => 'El :attribute debe ser una fecha posterior a :date.',
    'before_or_equal' => 'El :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'array' => 'El :attribute debe tener entre :min y :max items.',
        'file' => 'El :attribute debe estar entre :min y :max kilobytes.',
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'string' => 'El :attribute debe estar entre :min y :max caracteres.',
    ],
    'boolean' => 'El campo :attribute debe ser true o false.',
    'confirmed' => 'La confirmacion :attribute no coincide.',
    'current_password' => 'La contraseña es incorrecta.',
    'date' => 'El :attribute no es una fecha valida.',
    'date_equals' => 'El :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute no coincide con el formato :format.',
    'declined' => 'El :attribute debe ser rechazado',
    'declined_if' => 'El :attribute debe ser rechazado cuando :other es :value.',
    'different' => 'El :attribute y :other deben ser diferentes.',
    'digits' => 'El :attribute debe ser :digits digitos.',
    'digits_between' => 'El :attribute debe estar entre :min y :max digitos.',
    'dimensions' => 'El :attribute tiene dimensiones de imagen no válidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'doesnt_end_with' => 'El :attribute no puede terminar con uno de los siguientes: :values.',
    'doesnt_start_with' => 'El :attribute no puede comenzar con uno de los siguientes: :values.',
    'email' => 'El :attribute debe ser una email valido.',
    'ends_with' => 'El :attribute debe terminar con uno de los siguientes: :values.',
    'enum' => 'La seleccion :attribute es invalida.',
    'exists' => 'La seleccion :attribute es invalida.',
    'file' => 'El :attribute debe ser un fichero.',
    'filled' => 'El campo :attribute debe contener un valor.',
    'gt' => [
        'array' => 'El :attribute debe tener mas de :value items.',
        'file' => 'El :attribute debe ser mayor de :value kilobytes.',
        'numeric' => 'El :attribute debe ser mayor de :value.',
        'string' => 'El :attribute debe ser mayor de :value caracteres.',
    ],
    'gte' => [
        'array' => 'El :attribute debe tener :value elementos o mas.',
        'file' => 'El :attribute debe ser mayor o igual a :value kilobytes.',
        'numeric' => 'El :attribute debe ser mayor o igual a :value.',
        'string' => 'El :attribute debe ser mayor o igual a :value characters.',
    ],
    'image' => 'El :attribute debe ser una imagen.',
    'in' => 'La seleccion :attribute es invalida.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El :attribute debe ser un entero.',
    'ip' => 'El :attribute debe ser una direccion IP valida.',
    'ipv4' => 'El :attribute debe ser una direccion IPv4 valida.',
    'ipv6' => 'El :attribute debe ser una direccion IPv6 valida.',
    'json' => 'El :attribute debe ser una cadena JSON valida.',
    'lt' => [
        'array' => 'El :attribute debe tener menos de :value elementos.',
        'file' => 'El :attribute debe tener menos de :value kilobytes.',
        'numeric' => 'El :attribute debe tener menos de :value.',
        'string' => 'El :attribute debe tener menos de :value caracteres.',
    ],
    'lte' => [
        'array' => 'El :attribute no debe tener más de :value elementos.',
        'file' => 'El :attribute debe ser menor o igual que :value kilobytes.',
        'numeric' => 'El :attribute debe ser menor o igual que :value.',
        'string' => 'El :attribute debe ser menor o igual que :value characters.',
    ],
    'mac_address' => 'El :attribute debe ser una direccion MAC valida.',
    'max' => [
        'array' => 'El :attribute no debe tener mas than :max elementos.',
        'file' => 'El :attribute no debe ser mayor que :max kilobytes.',
        'numeric' => 'El :attribute no debe ser mayor que :max.',
        'string' => 'El :attribute no debe ser mayor que :max characters.',
    ],
    'mimes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'array' => 'El :attribute debe tener al menos :min elementos.',
        'file' => 'El :attribute debe ser por lo menos :min kilobytes.',
        'numeric' => 'El :attribute debe ser por lo menos :min.',
        'string' => 'El :attribute debe ser por lo menos :min characters.',
    ],
    'multiple_of' => 'El :attribute debe ser multiplo de :value.',
    'not_in' => 'The selected :attribute es invalido.',
    'not_regex' => 'El :attribute format es invalido.',
    'numeric' => 'El :attribute debe ser un numero.',
    'password' => [
        'letters' => 'El :attribute debe contener al menos una letra.',
        'mixed' => 'El :attribute debe contener al menos una letra mayuscula y miniscula.',
        'numbers' => 'El :attribute debe contener al menos un numero.',
        'symbols' => 'El :attribute debe contener al menos un simbolo.',
        'uncompromised' => 'Dado :attribute ha aparecido en una fuga de datos. Por favor, elija un diferente :attribute.',
    ],
    'present' => 'El campo :attribute debe estar presente.',
    'prohibited' => 'El campo :attribute esta prohibido.',
    'prohibited_if' => 'El campo :attribute esta prohibido cuando :other es :value.',
    'prohibited_unless' => 'El :attribute campo está prohibido a menos que :other es en :values.',
    'prohibits' => 'El campo :attribute prohibe :other de estar presente.',
    'regex' => 'El formato de :attribute es invalido.',
    'required' => 'El campo :attribute es requerido.',
    'required_array_keys' => 'El campo :attribute debe contener entradas para: :values.',
    'required_if' => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless' => 'El campo :attribute es requerido menos cuando :other es en :values.',
    'required_with' => 'El campo :attribute es requerido cuando :values esta presente.',
    'required_with_all' => 'El campo :attribute es requerido cuando :values estan presente.',
    'required_without' => 'El campo :attribute es requerido cuando :values no esta presente.',
    'required_without_all' => 'El campo :attribute se requiere cuando ninguno de :values estan presentes.',
    'same' => 'El :attribute and :other must match.',
    'size' => [
        'array' => 'El :attribute debe contener :size elementos.',
        'file' => 'El :attribute debe ser :size kilobytes.',
        'numeric' => 'El :attribute debe ser :size.',
        'string' => 'El :attribute debe ser :size caracteres.',
    ],
    'starts_with' => 'El :attribute debe comenzar con uno de los siguientes: :values.',
    'string' => 'El :attribute debe ser un string.',
    'timezone' => 'El :attribute debe ser un timezone valido.',
    'unique' => 'El :attribute ya ha sido utilizado.',
    'uploaded' => 'El :attribute fallo en la subida.',
    'url' => 'El :attribute debe ser una URL valida.',
    'uuid' => 'El :attribute debe ser un UUID valido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
