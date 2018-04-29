<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Storage;

class TestLogDateTimeTextFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $datetime = date('Y-m-d H:i:s');
        $contents = '';
        if(Storage::disk('local')->exists('testcmdcalljob.txt')) {
            $contents = Storage::disk('local')->get('testcmdcalljob.txt');
        }

        Storage::disk('local')->put('testcmdcalljob.txt', $contents."\n".$datetime);
    }
}
