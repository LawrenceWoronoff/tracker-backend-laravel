<?php

namespace App\Exports;

use App\Models\Tab;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HistoryExport implements FromCollection, WithHeadings
{
    // use Exportable;

    public function __construct()
    {
        // $this->id = $id;
    }

    public function query()
    {
        return Tab::query()->where('id', $this->id);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // /return Tab::get(['title', 'tabUrl', 'created_at', 'deleted_at']);
        $data = Tab::withTrashed()->get(['id', 'title', 'tabUrl', 'created_at', 'deleted_at']);
        $index = 0;
        foreach($data as $row){
            $index++;
            $row['id'] = $index;
            
            $duration = strtotime($row['deleted_at']) - strtotime($row['created_at']);
            $day = intval($duration / (60 * 60 * 24));
            $duration %= (60 * 60 * 24);
            $hour = intval($duration / (60 * 60));
            $duration %= (60 * 60);
            $minute = intval($duration / (60));
            $duration %= (60);
            $second = $duration;
            
            $str = '';
            $str .= $day != 0 ? ($day. ' day ') : '';
            $str .= $hour != 0 ? ($hour. ' hour ') : '';
            $str .= $minute != 0 ? ($minute). ' min ' : '';
            $str .= $second != 0 ? ($second. ' sec ') : '';
            $row['duration'] = $str;
            unset($row['deleted_at']);
        }
        
        return $data;
    }

    public function headings(): array
    {
        return ["No", "Title", "URL", "Open time", "Duration"];
    }
}
