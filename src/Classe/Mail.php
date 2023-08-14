<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;


class Mail
{
    private $api_key = 'a66966559d583749a5a014a1534c5ed1';
    private $api_key_secret = '2401e3eb0f1228298713cde9910bb6dc';

    public function send($to_email, $to_name, $subject, $content)
    {
        $mj = new Client($this->api_key, $this->api_key_secret, true,['version' => 'v3.1']);
     
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "syllaalhassana93@gmail.com",
                'Name' => "Brise d'été"
            ],
            'To' => [
                [
                    'Email' => "$to_email",
                    'Name' => "$to_name"
                ]
            ],
            'TemplateID' => 5001087,
            'TemplateLanguage' => true,
            'Subject' => "$subject",
            'Variables' => [
                'content' => "$content",
                
            ]
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
$response->success();
    }
}