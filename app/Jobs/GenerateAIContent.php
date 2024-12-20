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

        $prompt = "Generate a blog post about this topic
        (Please enhance the text design to align with a rich text editor, including headings, bullet points, and any other formatting that would improve readability): ";

        $yourApiKey = getenv('openai_key');
        $client = OpenAI::client($yourApiKey);
        $result = $client->chat()->create([
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'user', 'content' => $prompt . $this->content],
            ],
        ]);

        $generatedContent = $result->choices[0]->message->content;

        $slug = Str::slug($this->content);
        $uniqueSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $slug . '-' . $counter++;
        }
        // Store generated content to database
        Post::create([
            'title' => $this->content,
            'status'=> 'published',
            'content' => $generatedContent,
            'excerpt' => substr( $generatedContent, 0, 100),
            'published_at' => now(),
            'user_id' => 1,
            'slug' => $uniqueSlug,
        ]);
        JobProcessed::dispatch('JobProcessed');
        // $this->dispatch("jobProcessed");
    }
}
