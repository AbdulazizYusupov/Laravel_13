<?php

namespace App\Console\Commands;

use App\Models\Check;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-code';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Check::where('created_at', '<', Carbon::now()->subMinute())->delete();
    }
}
