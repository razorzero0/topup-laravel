<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MailtrapService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('MAILTRAP_API_KEY'); // Menggunakan MAILTRAP_API_KEY
    }

    public function sendEmail($from, $to, $subject, $text)
    {
        $url = 'https://send.api.mailtrap.io/api/send';

        $data = [
            'from' => [
                'email' => $from['email'],
                'name' => $from['name'],
            ],
            'to' => array_map(function ($recipient) {
                return ['email' => $recipient];
            }, $to),
            'subject' => $subject,
            'text' => $text,
            // 'category' => $category,
        ];

        try {
            $response = $this->client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            // Tangani kesalahan (log atau kembalikan respons)
            return ['error' => $e->getMessage()];
        }
    }
}
