<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class CancelUnpickedReservations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:cancelUnpickedbooks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancels book reservations not picked up before expiry date';

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
        DB::transaction(function(){
            $rows = DB::delete('delete from reserved_by_user where status="ready_for_collection" and return_date < ?;',[Carbon::now()]);
        });
    }
}
