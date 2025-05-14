<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TasksExport implements FromView
{
    protected $tasks;

    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    public function view(): View
    {
        return view('tasks.export_excel', ['tasks' => $this->tasks]);
    }
}
