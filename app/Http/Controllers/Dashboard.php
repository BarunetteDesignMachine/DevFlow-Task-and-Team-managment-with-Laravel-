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
use App\Models\User;
use App\Models\Group;
use App\Models\Role;
use App\Models\Tasks;

class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        $group_id = Auth::user()->group_id;;

        $users = User::where('group_id', $group_id)->get();

        $roles = ['admin', 'senior dev', 'junior dev'];
        $tasks = Tasks::where('group_id', $group_id)->get();
        return view('dashboard', compact('users', 'roles','tasks'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->role = $request->input('role');
        $user->save();

        return redirect('/dashboard');
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $group_id = $user->group_id;

        $task = new Tasks;
        $task->title = $request->input('title');
        $task->content = $request->input('content');
        $task->assigned_to = $request->input('assigned_to');
        $task->deadline = Carbon::parse($request->input('deadline'));
        $task->status = $request->input('status');
        $task->group_id = $group_id;
        $task->save();

        return redirect('/tasks');
    }
}
