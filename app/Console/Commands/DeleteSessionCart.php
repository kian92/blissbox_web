<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Carbon\Carbon;

class DeleteSessionCart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteSessionCart:deletecarts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the session item in the cart after 30 minutes.';

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
        DB::table('carts')->where([['user_id', NULL], ['created_at', '<', Carbon::now()->subMinutes(30)->format('Y-m-d H:i:s')]])->delete();
    }
}
