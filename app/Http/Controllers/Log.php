<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Termwind\render;
use App\Exports\CompletedTasksExport;
use App\Models\User;
use App\Models\Tasks;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;
class Log extends Controller
{
    public function index()
    {
        $session = session();
        $group_id = Auth::user()->group_id;;

        $users = User::where('group_id', $group_id)->get();

        $roles = ['admin', 'senior dev', 'junior dev'];
        $tasks = Tasks::where('group_id', $group_id)->get();
        return view('logs', compact('users', 'roles', 'tasks'));
    }

    public function export(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');


        return Excel::download(new CompletedTasksExport($start_date, $end_date), 'Tsk_Logs.xlsx');
    }
}
