<?php

namespace App\Mail;

use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mime\RawMessage;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MailerSendTransport extends AbstractTransport
{
    private $client;
    private $apiKey;

    public function __construct(HttpClientInterface $client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    protected function doSend(RawMessage $message, Envelope $envelope): void
    {
        $html = $message->toString();

        $this->client->request('POST', 'https://api.mailersend.com/v1/email', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type'  => 'application/json',
            ],
            'json' => [
                'from' => [
                    'email' => config('mail.from.address'),
                    'name' => config('mail.from.name'),
                ],
                'to' => [
                    ['email' => $envelope->getRecipients()[0]->getAddress()]
                ],
                'subject' => $message->getSubject(),
                'html' => $html,
            ],
        ]);
    }

    public function __toString(): string
    {
        return 'mailersend';
    }
}
