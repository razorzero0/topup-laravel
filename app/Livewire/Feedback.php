<?php

namespace App\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class Feedback extends Component
{
    public $email, $message, $name;
    public function render()
    {
        return view('livewire.feedback');
    }

    public function sendEmail()
    {
        $data = [
            'service_id' => env('EMAILJS_SERVICE_ID'),
            'template_id' => env('EMAILJS_TEMPLATE_ID'),
            'user_id' => env('EMAILJS_PUBLIC_KEY'),
            'template_params' => [
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->message,

            ],
        ];

        try {
            $client = new Client();
            $response = $client->post('https://api.emailjs.com/api/v1.0/email/send', [
                'json' => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);


            if ($response->getStatusCode() == 200) {
                $this->name = '';
                $this->email = '';
                $this->message = '';
                // Dispatch event untuk notifikasi sukses
                $this->dispatch('alert', ['type' => 'success', 'message' => 'Pesan sukses dikirim!']);
            } else {
                // Dispatch event untuk notifikasi error
                $this->dispatch('alert', ['type' => 'error', 'message' => 'Pesan anda gagal dikirim!']);
            }
        } catch (\Exception $e) {
            // Dispatch event for error
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Oops... ' . $e->getMessage()]);
        }
    }
}
