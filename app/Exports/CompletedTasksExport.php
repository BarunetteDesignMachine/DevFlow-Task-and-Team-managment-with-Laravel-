<?php
namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Tasks;
class CompletedTasksExport implements FromCollection, WithHeadings
{


    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    public function headings(): array
    {
        return [
            'Task ID',
            'Title',
            'Content',
            'status',
            'Assigned to',
            'Deadline',
            'Group ID',
            'Finished At',
        ];
    }
    public function collection()
    {
        $tasks = Tasks::where('status', 'completed')
            ->whereBetween('finished_at', [$this->start_date, $this->end_date])
            ->get();

        return $tasks;
    }



}
