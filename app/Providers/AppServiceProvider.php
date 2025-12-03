<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Mail\MailerSendTransport;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot()
    {
        $this->app->extend(TransportInterface::class, function ($service, $app) {
            return new MailerSendTransport(
                $app->make(HttpClientInterface::class),
                config('mail.mailers.mailersend.api_key', env('MAILERSEND_API_KEY'))
            );
        });
    }
}
