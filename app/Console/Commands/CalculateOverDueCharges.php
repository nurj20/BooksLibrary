<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CalculateOverDueCharges extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:calculateOverdueCharges';

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
        DB::transaction(function(){
            // DB::update('update overdue_from_user set penality=?');
            $ids =DB::select('select id from users;');
            if ($ids){
                foreach($ids as $id){
                    $rows = DB::select('select over_since, book_id from overdue_from_user where user_id= ?;',[$id->id]);
                    if ($rows){
                        $total_penality = 0.0;
                        foreach($rows as $row){
                        $penality = 0.0;
                        $penality += 0.05*( Carbon::parse($row->over_since)->diffInDays(  Carbon::today()));
                        $penality = number_format($penality, 2);
                    DB::update('update overdue_from_user set penality=? where book_id=?;',[$penality, $row->book_id]);    
                    $total_penality+= $penality;
                    }
                    DB::update('update users set penality=? where id=?;',[$total_penality,$id->id]);
                        //  dd(number_format($penality, 2));
                    } //end of if rows
                } // end of foreach
            } // end of if ids
            
        });
    }
}
