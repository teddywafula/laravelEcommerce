<?php
return [
    'name' => [
      'required' => 'Name is required'
    ],
    'first_name' => [
        'required' => 'Firstname is required'
    ],
    'last_name' => [
        'required' => 'Lastname is required'
    ],
    'company_name' => [
        'required' => 'Company name is required',
        'unique' => 'The company name already exists'
    ],
    'phone' => [
        'required' => 'Phone is required'
    ],
    'country' => [
        'required' => 'Country is required'
    ],
    'location' => [
        'required' => 'Location is required'
    ],
    'company_email' => [
        'required' => 'Company email is required',
        'email' => 'Enter a valid company email',
        'unique' => 'The company email already exists'
    ]
];
