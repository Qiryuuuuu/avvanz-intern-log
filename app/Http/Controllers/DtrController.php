<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Record;

class DtrController extends Controller
{
    public function index(){
 
        $records = Record::all();
        $activeTime = Record::whereNull('time_out')->first();

        return view('dtr.index', [
            'records' => $records,
            'activeTime' => $activeTime,
         ]);
    }



    public function timeIn(Request $request){
        $currentDateTime = now();
        $currentDate = $currentDateTime->toDateString();
        $currentTime = $currentDateTime->toTimeString();

        $time = Record::create([
            'work_date' => $currentDate,
            'time_in' => $currentTime
        ]);

        return redirect(route('dtr.index'));
    }

    public function timeOut($id){
        $records = Record::findOrFail($id);
        $timeOut = now();
        
        $timeIn = Carbon::parse($records->time_in);
    
        $totalMinutes = $timeIn->diffInMinutes($timeOut);
    
        $decimalHours = round($totalMinutes / 60, 2); 
    
        $records->update([
            'time_out' => $timeOut->toTimeString(),
            'total_hours' => $decimalHours 
        ]);
    
        return redirect()->back();
    }
    
    
    
}
