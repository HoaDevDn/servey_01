<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
class TimeSurveyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:timeSurvey';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'timeSurvey description';

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
        \Log::info('Tạo cron job trong laravel phần 2');
    }
}
