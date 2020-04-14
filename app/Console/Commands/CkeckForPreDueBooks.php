<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Notifications\PreDueNoticeNotification;
use Illuminate\Support\Facades\Notification;

class CkeckForPreDueBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checkForPredueBooks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        DB::transaction(function (){
            $rows = DB::select('select * from borrowed_by_user where return_date >= ?',[Carbon::now()->subDay(3)]); 
            if ($rows){
                foreach($rows as $row){

                   $email =  DB::select('select email from users where id=?', [$row->user_id]);
                    Notification::route('mail', $email)->notify(new PreDueNoticeNotification());
                }
            }
            
        });
    }
}
