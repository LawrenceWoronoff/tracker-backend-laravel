<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tab;
use App\Exports\HistoryExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function showhistory() {
        $history = Tab::withTrashed()->get();
        foreach($history as $row){
            $row['duration'] = '';

            if($row['deleted_at']) {
               $duration = strtotime($row['deleted_at']) - strtotime($row['created_at']);
               $day = intval($duration / (60 * 60 * 24));
               $duration %= (60 * 60 * 24);
               $hour = intval($duration / (60 * 60));
               $duration %= (60 * 60);
               $minute = intval($duration / (60));
               $duration %= (60);
               $second = $duration;
               
               $row['duration'] .= $day != 0 ? ($day. ' day ') : '';
               $row['duration'] .= $hour != 0 ? ($hour. ' hour ') : '';
               $row['duration'] .= $minute != 0 ? ($minute). ' min ' : '';
               $row['duration'] .= $second != 0 ? ($second. ' sec ') : '';
            }
        }
        return view('history')->with(["history" => $history]);
    }

    public function export() {
        // var_dump(Tab::all());
        // exit(0);
        return Excel::download(new HistoryExport, 'browsehistory-'. Date('Y-m-d H:i:s'). '.xlsx');
    }
}
