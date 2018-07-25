<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\MailMessage;
use App\Notifications\MailMessageToAuth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user1;
    protected $user2;
    protected $url;
    // protected $user2 = Auth::user();
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user1, User $user2, $url)
    {
        $this->user1 = $user1;
        $this->user2 = $user2;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user1->notify(new MailMessageToAuth($this->url));
        $this->user2->notify(new MailMessage($this->url));
    }
}
