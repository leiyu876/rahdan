<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Storage;


class LogDateTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logdatetime:dologdatetime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log Date and Time to test logdatetime command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $datetime = date('Y-m-d H:i:s');
        $contents = '';
        if(Storage::disk('local')->exists('taskschedchecking.txt')) {
            $contents = Storage::disk('local')->get('taskschedchecking.txt');
        }

        Storage::disk('local')->put('taskschedchecking.txt', $contents."\n".$datetime);
    }
}
