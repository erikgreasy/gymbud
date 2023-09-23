<?php

namespace App\Console\Commands;

use App\Actions\RecalculatePersonalRecords;
use Illuminate\Console\Command;

class RecalculatePersonalRecordsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gymbud:recalculate-personal-records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recaulculate all PRs';

    /**
     * Execute the console command.
     */
    public function handle(RecalculatePersonalRecords $recalculatePersonalRecords)
    {
        $recalculatePersonalRecords->execute();
    }
}
