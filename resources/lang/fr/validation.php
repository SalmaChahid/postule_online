<?php

return [
    'accepted'             => 'Le champ :attribute doit être accepté.',
    'active_url'           => 'Le champ :attribute n\'est pas une URL valide.',
    'after'                => 'Le champ :attribute doit être une date après :date.',
    'alpha'                => 'Le champ :attribute ne peut contenir que des lettres.',
    'alpha_dash'           => 'Le champ :attribute ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num'            => 'Le champ :attribute ne peut contenir que des lettres et des chiffres.',
    'array'                => 'Le champ :attribute doit être un tableau.',
    'before'               => 'Le champ :attribute doit être une date avant :date.',
    'between'              => [
        'numeric' => 'Le champ :attribute doit être entre :min et :max.',
        'file'    => 'Le fichier :attribute doit être entre :min et :max kilo-octets.',
        'string'  => 'Le champ :attribute doit être entre :min et :max caractères.',
        'array'   => 'Le tableau :attribute doit avoir entre :min et :max éléments.',
    ],
    'boolean'              => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed'            => 'La confirmation du champ :attribute ne correspond pas.',
    'date'                 => 'Le champ :attribute n\'est pas une date valide.',
    'date_equals'          => 'Le champ :attribute doit être une date égale à :date.',
    'date_format'          => 'Le champ :attribute ne correspond pas au format :format.',
    'different'            => 'Les champs :attribute et :other doivent être différents.',
    'digits'               => 'Le champ :attribute doit être :digits chiffres.',
    'digits_between'       => 'Le champ :attribute doit être entre :min et :max chiffres.',
    'dimensions'           => 'Le champ :attribute a des dimensions d\'image invalides.',
    'distinct'             => 'Le champ :attribute a une valeur dupliquée.',
    'email'                => 'Le champ :attribute doit être une adresse e-mail valide.',
    'exists'               => 'Le champ :attribute sélectionné est invalide.',
    'file'                 => 'Le champ :attribute doit être un fichier.',
    'filled'               => 'Le champ :attribute doit avoir une valeur.',
    'gt'                   => [
        'numeric' => 'Le champ :attribute doit être supérieur à :value.',
        'file'    => 'Le fichier :attribute doit être supérieur à :value kilo-octets.',
        'string'  => 'Le champ :attribute doit être supérieur à :value caractères.',
        'array'   => 'Le tableau :attribute doit avoir plus de :value éléments.',
    ],
    'gte'                  => [
        'numeric' => 'Le champ :attribute doit être supérieur ou égal à :value.',
        'file'    => 'Le fichier :attribute doit être supérieur ou égal à :value kilo-octets.',
        'string'  => 'Le champ :attribute doit être supérieur ou égal à :value caractères.',
        'array'   => 'Le tableau :attribute doit avoir :value éléments ou plus.',
    ],
    'image'                => 'Le champ :attribute doit être une image.',
    'in'                   => 'Le champ :attribute sélectionné est invalide.',
    'in_array'             => 'Le champ :attribute n\'existe pas dans :other.',
    'integer'              => 'Le champ :attribute doit être un entier.',
    'ip'                   => 'Le champ :attribute doit être une adresse IP valide.',
    'ipv4'                 => 'Le champ :attribute doit être une adresse IPv4 valide.',
    'ipv6'                 => 'Le champ :attribute doit être une adresse IPv6 valide.',
    'json'                 => 'Le champ :attribute doit être une chaîne JSON valide.',
    'lt'                   => [
        'numeric' => 'Le champ :attribute doit être inférieur à :value.',
        'file'    => 'Le fichier :attribute doit être inférieur à :value kilo-octets.',
        'string'  => 'Le champ :attribute doit être inférieur à :value caractères.',
        'array'   => 'Le tableau :attribute doit avoir moins de :value éléments.',
    ],
    'lte'                  => [
        'numeric' => 'Le champ :attribute doit être inférieur ou égal à :value.',
        'file'    => 'Le fichier :attribute doit être inférieur ou égal à :value kilo-octets.',
        'string'  => 'Le champ :attribute doit être inférieur ou égal à :value caractères.',
        'array'   => 'Le tableau :attribute doit avoir :value éléments ou moins.',
    ],
    'max'                  => [
        'numeric' => 'Le champ :attribute ne peut pas être supérieur à :max.',
        'file'    => 'Le fichier :attribute ne peut pas être plus grand que :max kilo-octets.',
        'string'  => 'Le champ :attribute ne peut pas être plus grand que :max caractères.',
        'array'   => 'Le tableau :attribute ne peut pas avoir plus de :max éléments.',
    ],
    'mimes'                => 'Le champ :attribute doit être un fichier de type :values.',
    'mimetypes'            => 'Le champ :attribute doit être un fichier de type :values.',
    'min'                  => [
        'numeric' => 'Le champ :attribute doit être au moins :min.',
        'file'    => 'Le fichier :attribute doit être d\'au moins :min kilo-octets.',
        'string'  => 'Le champ :attribute doit comporter au moins :min caractères.',
        'array'   => 'Le tableau :attribute doit avoir au moins :min éléments.',
    ],
    'not_in'               => 'Le champ :attribute sélectionné est invalide.',
    'numeric'              => 'Le champ :attribute doit être un nombre.',
    'password'             => 'Le mot de passe est incorrect.',
    'present'              => 'Le champ :attribute doit être présent.',
    'regex'                => 'Le champ :attribute a un format invalide.',
    'required'             => 'Le champ :attribute est requis.',
    'required_if'          => 'Le champ :attribute est requis lorsque :other est :value.',
    'required_unless'      => 'Le champ :attribute est requis à moins que :other ne soit dans :values.',
    'same'                 => 'Le champ :attribute et :other doivent être identiques.',
    'size'                 => [
        'numeric' => 'Le champ :attribute doit être de taille :size.',
        'file'    => 'Le fichier :attribute doit être de :size kilo-octets.',
        'string'  => 'Le champ :attribute doit avoir :size caractères.',
        'array'   => 'Le tableau :attribute doit contenir :size éléments.',
    ],
    'string'               => 'Le champ :attribute doit être une chaîne de caractères.',
    'timezone'             => 'Le champ :attribute doit être un fuseau horaire valide.',
    'unique'               => 'Le champ :attribute a déjà été pris.',
    'url'                  => 'Le champ :attribute n\'est pas une URL valide.',
    'uuid'                 => 'Le champ :attribute doit être un UUID valide.',
    // المزيد من الرسائل
];
