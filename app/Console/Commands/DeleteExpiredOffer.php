<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Offer;
use Carbon\Carbon;

class DeleteExpiredOffer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'offer:expired';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the offers which has expired date';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Offer::where('ended_at', '<', Carbon::now())->each(function ($ended_at) {
            $ended_at->delete();
        });
        // return Command::SUCCESS;
    }
}
