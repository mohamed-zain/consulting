<?php

namespace App\Console\Commands;

use App\Models\ActivateFile;
use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AssignTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:assign';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'assign tasks to eng on times';

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
       $Schedule_tasks = DB::table('Schedule_tasks')->where('Scheduled','notDone')->get();
       if(isset($Schedule_tasks)){
           foreach ($Schedule_tasks as $items){
               $date = \Carbon\Carbon::parse($items->assign_date. "00:00:00");
               $tody = Carbon::today();
               $che = Tasks::where('Bennar_Code',$items->Bennar_Code)->where('Mission',$items->Mission)->first();
               if (!isset($che)){
                   if ($date <= $tody){
                       DB::table('tasks')->insert([
                           'Bennar_Code' => $items->Bennar_Code,
                           'EmpID' => $items->EmpID,
                           'Mission' => $items->Mission,
                           'Deadline' => $items->Deadline,
                       ]);
                       DB::table('Schedule_tasks')->where('id',$items->id)->update([
                           'Scheduled'=>'Done'
                       ]);
                       ActivateFile::where('Bennar','=',$items->Bennar_Code)
                           ->update(
                               [
                                   'EngID' => $items->EmpID,
                               ]
                           );
                   }
               }else{
                   return '';
               }



           }
       }

        return Command::SUCCESS;
    }
}
