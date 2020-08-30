<?php

namespace App\Jobs;

use App\Services\ParserService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param ParserService $parser
     */
    public $parser;

    public function __construct(ParserService $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->parser->saveData();
    }
}
