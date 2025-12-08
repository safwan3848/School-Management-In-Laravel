<?php

namespace App\Jobs;

use App\Mail\WelcomeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;

class SendWelcomeEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    /**
     * Max attempts before marking job as failed
     */
    public $tries = 5;

    /**
     * Backoff time between retry attempts (in seconds)
     * You can also return an array like [10, 30, 60]
     */
    public $backoff = 10;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Rate Limit: allow only 5 emails per minute (example)
        $key = 'send_welcome_email:' . $this->user->id;

        if (!RateLimiter::attempt($key, 5, function () {}, 60)) {
            Log::warning("Rate limited: Welcome email skipped for user {$this->user->email}");
            return;
        }

        // Logging start 
        Log::info("Sending Welcome Email to: {$this->user->email}");

        // Send Mail
        Mail::to($this->user->email)->send(new WelcomeMail($this->user));

        // Logging success
        Log::info("Welcome Email successfully sent to: {$this->user->email}");
    }

    /**
     * Handle failure (if job fails after max attempts)
     */
    public function failed(\Throwable $exception)
    {
        Log::error("FAILED to send welcome email to {$this->user->email}. Error: " . $exception->getMessage());
    }
}
