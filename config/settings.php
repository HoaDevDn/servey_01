<?php

return [
    'image_system' => '/library/images/',
    'image_default' => 'questionDefault.png',
    'image_path' => 'image/',
    'image_question_path' => '/user/uploads/question/',
    'image_answer_path' => '/user/uploads/answer/',
    'survey' => [
        'not_feature' => '0',
        'feature' => '1',
    ],
    'question' => [
        'not_required' => '0',
        'required' => '1',
    ],
    'paginate'=> '9',
    'type_answer' => [
        'radiobutton' => '1',
        'checkbox' => '2',
        'textfield' => '3',
        'selectbox' => '4',
    ],
    'result' => [
        'success' => 'true',
        'fail' => 'false',
    ],
    'feature' => 1,
    'not_feature' => 0,
    'mark' => 1,
    'unmark' => 0,
    'google' => 'google',
    'replace' => 'survey/result/',
    'required' => [
        'true' => 1,
        'false' => 0,
    ],
    'return' => [
        'bool' => 0,
        'view' => 1,
    ],
    'locale' => [
        'en',
        'vn',
    ],
    'language' => [
        'en' => 'English',
        'vn' => 'VietNamese',
    ],
    'options' => [
        1,
        2,
        3,
    ],
    'key' => [
        'requireAnswer' => 1,
        'limitAnswer' => 2,
        'hideResult' => 3,
        'requireOnce' => 4,
        'tailMail' => 5,
    ],
    'require' => [
        'email' => 1,
        'name' => 2,
        'both' => 3,
    ],
    'isZero' => 0,
    'all_key' => [
        1,
        2,
        3,
        4,
        5,
    ],
];
