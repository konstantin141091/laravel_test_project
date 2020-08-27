<?php

namespace App\Listeners;

use App\Models\News;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if (isset($event->news)) {
            $shows = $event->news->shows;
            $shows++;
            $news = News::query()->find($event->news->id);
            $news->shows = $shows;
            $news->save();
        }
    }
}
