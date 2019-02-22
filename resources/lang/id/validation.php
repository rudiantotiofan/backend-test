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

    'accepted'             => 'Data :attribute harus diterima.',
    'active_url'           => 'Data :attribute bukan URL yang sah.',
    'after'                => 'Data :attribute harus tanggal setelah :date.',
    'alpha'                => 'Data :attribute hanya boleh berisi huruf.',
    'alpha_dash'           => 'Data :attribute hanya boleh berisi huruf, angka, dan strip.',
    'alpha_num'            => 'Data :attribute hanya boleh berisi huruf dan angka.',
    'array'                => 'Data :attribute harus berupa sebuah array.',
    'before'               => 'Data :attribute harus tanggal sebelum :date.',
    'between'              => [
        'numeric' => 'Data :attribute harus antara :min dan :max.',
        'file'    => 'Data :attribute harus antara :min dan :max kilobytes.',
        'string'  => 'Data :attribute harus antara :min dan :max karakter.',
        'array'   => 'Data :attribute harus antara :min dan :max item.',
    ],
    'boolean'              => 'Data :attribute harus berupa true atau false',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => 'Data :attribute bukan tanggal yang valid.',
    'date_format'          => 'Data :attribute tidak cocok dengan format :format.',
    'different'            => 'Data :attribute dan :other harus berbeda.',
    'digits'               => 'Data :attribute harus berupa angka :digits.',
    'digits_between'       => 'Data :attribute harus antara angka :min dan :max.',
    'dimensions'           => 'Data :attribute harus merupakan dimensi gambar yang sah.',
    'distinct'             => 'Data :attribute memiliki nilai yang duplikat.',
    'email'                => 'Data :attribute harus berupa alamat email yang valid.',
    'exists'               => 'Data :attribute yang dipilih tidak valid.',
    'filled'               => 'Data :attribute wajib diisi.',
    'image'                => 'Data :attribute harus berupa gambar.',
    'in'                   => 'Data :attribute yang dipilih tidak valid.',
    'in_array'             => 'Data :attribute tidak terdapat dalam :other.',
    'integer'              => 'Data :attribute harus merupakan bilangan bulat.',
    'ip'                   => 'Data :attribute harus berupa alamat IP yang valid.',
    'json'                 => 'Data :attribute harus berupa JSON string yang valid.',
    'max'                  => [
        'numeric' => 'Data :attribute seharusnya tidak lebih dari :max.',
        'file'    => 'Data :attribute seharusnya tidak lebih dari :max kilobytes.',
        'string'  => 'Data :attribute seharusnya tidak lebih dari :max karakter.',
        'array'   => 'Data :attribute seharusnya tidak lebih dari :max item.',
    ],
    'mimes'                => 'Data :attribute harus dokumen berjenis : :values.',
    'min'                  => [
        'numeric' => 'Data :attribute harus minimal :min.',
        'file'    => 'Data :attribute harus minimal :min kilobytes.',
        'string'  => 'Data :attribute harus minimal :min karakter.',
        'array'   => 'Data :attribute harus minimal :min item.',
    ],
    'not_in'               => 'Data :attribute yang dipilih tidak valid.',
    'numeric'              => 'Data :attribute harus berupa angka.',
    'present'              => 'Data :attribute wajib ada.',
    'regex'                => 'Format Data :attribute tidak valid.',
    'required'             => 'Data :attribute wajib diisi.',
    'required_if'          => 'Data :attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Data :attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Data :attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => 'Data :attribute wajib diisi bila terdapat :values.',
    'required_without'     => 'Data :attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => 'Data :attribute wajib diisi bila tidak terdapat ada :values.',
    'same'                 => 'Data :attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Data :attribute harus berukuran :size.',
        'file'    => 'Data :attribute harus berukuran :size kilobyte.',
        'string'  => 'Data :attribute harus berukuran :size karakter.',
        'array'   => 'Data :attribute harus mengandung :size item.',
    ],
    'string'               => 'Data :attribute harus berupa string.',
    'timezone'             => 'Data :attribute harus berupa zona waktu yang valid.',
    'unique'               => 'Data :attribute sudah ada sebelumnya.',
    'url'                  => 'Format Data :attribute tidak valid.',
    'hash'        => 'Data :attribute tidak cocok.',

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
        'phone_number' => [
            'wholesaler_phone' => 'Data Nomor HP :value sudah ada sebelumnya.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
