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

    'accepted' => ':attribute должен быть принят.',
    'active_url' => ':attribute не является действительным URL.',
    'after' => ':attribute должно быть дата после :date.',
    'after_or_equal' => ':attribute должен быть датой после или равной :date.',
    'alpha' => ':attribute может содержать только буквы',
    'alpha_dash' => ':attribute может содержать только буквы, цифры, дефисы и символы подчеркивания.',
    'alpha_num' => ':attribute может содержать только буквы и цифры.',
    'array' => ':attribute должен быть массивом.',
    'before' => ':attribute должен быть датой перед :date.',
    'before_or_equal' => ':attribute должен быть датой до или равной :date.',
    'between' => [
        'numeric' => ':attribute должен находиться в диапазоне от :min до :max.',
        'file' => ':attribute должен находиться в диапазоне от :min до :max килобайт.',
        'string' => ':attribute должен содержать :min и :max символы.',
        'array' => ':attribute должен содержать от :min до :max элементов.',
    ],
    'boolean' => 'Поле :attribute должно быть истинным или ложным.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'date' => ':attribute не является допустимой датой.',
    'date_equals' => ':attribute должен быть датой, равной :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'different' => ':attribute и :other должны отличаться.',
    'digits' => ':attribute должен быть :digits цифрами.',
    'digits_between' => ':attribute должен быть между :min и :max цифрами.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute имеет повторяющееся значение.',
    'email' => ':attribute должен быть действительным адресом электронной почты.',
    'ends_with' => ':attribute должен заканчиваться одним из следующих: :values.',
    'exists' => 'Селект :attribute не действителен.',
    'file' => ':attribute должен быть файлом',
    'filled' => 'Поле :attribute должно иметь значение.',
    'gt' => [
        'numeric' => ':attribute должен быть больше, чем :value.',
        'file' => ':attribute должен быть больше :value в килобайтах.',
        'string' => ':attribute должен содержать больше :value символов.',
        'array' => ':attribute должен содержать более :value элементов.',
    ],
    'gte' => [
        'numeric' => ':attribute должен быть больше или равен :value.',
        'file' => ':attribute должен быть больше или равен :value в килобайтах.',
        'string' => ':attribute должен быть больше или равен :value символам.',
        'array' => ':attribute должен иметь :value элементы или больше.',
    ],
    'image' => ':attribute должен быть изображением.',
    'in' => 'Селект :attribute недействителен.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => ':attribute должен быть целым числом.',
    'ip' => ':attribute должен быть действительным IP-адресом.',
    'ipv4' => ':attribute должен быть действительным адресом IPv4.',
    'ipv6' => ':attribute должен быть действительным IPv6-адресом.',
    'json' => ':attribute должен быть допустимой строкой JSON.',
    'lt' => [
        'numeric' => ':attribute должен быть меньше :value.',
        'file' => ':attribute должен быть меньше :value килобайт.',
        'string' => ':attribute должен содержать меньше :value символов.',
        'array' => ':attribute должен содержать меньше :value элементов.',
    ],
    'lte' => [
        'numeric' => ':attribute должен быть меньше или равен :value.',
        'file' => ':attribute должен быть меньше или равен :value в килобайтах.',
        'string' => ':attribute должен быть меньше или равен :value символам.',
        'array' => ':attribute не может содержать более :value элементов.',
    ],
    'max' => [
        'numeric' => ':attribute не может быть больше, чем :max.',
        'file' => ':attribute не может быть больше :max килобайт.',
        'string' => ':attribute не может содержать больше :max символов.',
        'array' => ':attribute может содержать не более :max элементов.',
    ],
    'mimes' => ':attribute должен быть файлом типа: :values.',
    'mimetypes' => ':attribute должен быть файлом типа: :values.',
    'min' => [
        'numeric' => ':attribute должен быть не меньше :min.',
        'file' => ':attribute должен быть не менее :min килобайт.',
        'string' => ':attribute должен содержать не менее :min символов.',
        'array' => ':attribute должен содержать как минимум :min элементов.',
    ],
    'not_in' => 'Селект :attribute недействителен.',
    'not_regex' => 'Формат :attribute недействителен',
    'numeric' => ':attribute должен быть числом.',
    'password' => 'Пароль неверен.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'Формат :attribute недействителен.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_if' => 'Поле :attribute требуется, когда :other значение :value.',
    'required_unless' => 'Поле :attribute является обязательным, если :other не входит в :values.',
    'required_with' => 'Поле :attribute требуется, если присутствует :values.',
    'required_with_all' => 'Поле :attribute необходимо, если присутствуют :values',
    'required_without' => 'Поле :attribute является обязательным, если :values ​​отсутствует.',
    'required_without_all' => 'Поле :attribute является обязательным, если нет ни одного из :values',
    'same' => ':attribute и :other должны совпадать.',
    'size' => [
        'numeric' => ':attribute должен быть размером :size.',
        'file' => ':attribute должен быть размером :size в килобайтах.',
        'string' => ':attribute должен содержать :size символы.',
        'array' => ':attribute должен содержать :size элементы.',
    ],
    'starts_with' => ':attribute должен начинаться с одного из следующих: :values.',
    'string' => ':attribute должен быть строкой.',
    'timezone' => ':attribute должен быть допустимой зоной.',
    'unique' => ':attribute уже был занят.',
    'uploaded' => ':attribute не удалось загрузить.',
    'url' => 'Формат :attribute недействителен',
    'uuid' => ':attribute должен быть действительным UUID.',

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
