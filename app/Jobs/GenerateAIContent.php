<?php

namespace App\Jobs;

use OpenAI;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Events\JobProcessed;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateAIContent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $content;

    public function __construct( $content)
    {
        $this->content = $content;
    }

    public function handle()
    {
        // Simulate AI content generation
        $generatedContent = "Generated AI Content: " . $this->content;

        $prompt = "Generate a blog post about (You can separate Paragraph line brank to visuliaze tag and add header if exist with html tag like <b></b> <i></i> or other tags): ";

        $yourApiKey = getenv('openai_key');
        $client = OpenAI::client($yourApiKey);
        $result = $client->chat()->create([
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'user', 'content' => $prompt . $this->content],
            ],
        ]);

        $generatedContent = $result->choices[0]->message->content;

        // Store generated content to database
        Post::create([
            'title' => $this->content,
            'content' => $generatedContent,
            'excerpt' => substr( $generatedContent, 0, 100),
            'published_at' => now(),
            'user_id' => 1,
            'slug' => Str::slug($this->content. '-' .uniqid()),
        ]);
        logger('g');
        JobProcessed::dispatch('JobProcessed');
        // $this->dispatch("jobProcessed");
        logger('processed');

    }
}
