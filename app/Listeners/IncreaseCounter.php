<?php

namespace App\Listeners;

use App\Events\VideoViewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class IncreaseCounter
{
    /**
     * Create the event listener.
     */
    public function __construct(VideoViewer $event)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VideoViewer $event): void
    {
        $this->updateViewer($event->video);
    }

    function  updateViewer($video) {
        $video->viewers = $video->viewers + 1;
        $video->save();
    }
}
