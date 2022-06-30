<?php

namespace App\Console\Commands;

use App\Models\Node;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DailyNode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'node:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Respectively previous Day Data on Node Table';

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
     * @return int
     */
    public function handle()
    {
        Node::where('created_at','<',Carbon::now())->delete();
        $this->info('Successfully delete previous  day node Data.');
    }
}
