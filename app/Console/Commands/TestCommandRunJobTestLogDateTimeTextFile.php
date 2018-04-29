<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Jobs\TestLogDateTimeTextFile;

class TestCommandRunJobTestLogDateTimeTextFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:runjobtestlogdatetimetextfile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test if a command can call run a job, this sample job will log datetime to testcmdcalljob.txt';

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
        TestLogDateTimeTextFile::dispatch();
    }
}
