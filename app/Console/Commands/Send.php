<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Send extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log ga test uchun xabar yozish';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Xabar yozildi');
    }
}
