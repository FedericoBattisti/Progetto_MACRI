<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use App\Mail\NewsletterSubscribed;

class NewsletterTest extends TestCase
{
    /** @test */
    public function user_can_subscribe_to_newsletter()
    {
        Mail::fake();

        $response = $this->post(route('newsletter.subscribe'), [
            'email' => 'test@example.com',
        ]);

        $response->assertSessionHas('success');
        Mail::assertSent(NewsletterSubscribed::class, function ($mail) {
            return $mail->email === 'test@example.com';
        });
    }
}
