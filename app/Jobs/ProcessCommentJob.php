<?php

namespace App\Jobs;

use App\Models\Comment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Sleep;

class ProcessCommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subject;
    protected $body;
    protected $articleId;

    /**
     * Create a new job instance.
     */
    public function __construct($subject, $body, $articleId)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->articleId = $articleId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $comment = Comment::create([
            'subject' => $this->subject,
            'body' => $this->body,
            'article_id' => $this->articleId,
        ]);

        // TODO: some hiload logic
        // Notification::send(...);
        Sleep::sleep(5);

        Log::info("Комментарий к статье ID {$this->articleId} создан.");
    }
}
