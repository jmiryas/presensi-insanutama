<?php

use kartik\datecontrol\Module;

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'bsVersion' => '4.x',
    'dateControlDisplay' => [
        Module::FORMAT_DATE => 'dd-MM-yyyy',
        Module::FORMAT_TIME => 'hh:mm:ss',
        Module::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm:ss',
    ],
    'dateControlSave' => [
        Module::FORMAT_DATE => 'php:U', // saves as unix timestamp
        Module::FORMAT_TIME => 'php:H:i:s',
        Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
    ]
];
