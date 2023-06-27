<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use function Termwind\render;
use App\Models\User;
use App\Models\Group;
use App\Models\Tasks;


class Task extends BaseController
{

    public function index()
    {
        $user = Auth::user();
        $group_id = $user->group_id;

        $tasks = Tasks::where('group_id', $group_id)->get();

        $users = User::where('group_id', $group_id)->get();
        return view('task', compact('tasks', 'users'));
    }
    public function complete(Request $request, $id)
    {
        $task = Tasks::find($id);
        if ($task->assigned_to != Auth::user()->id) {
            return abort(403);
        }

        $task->status = 'completed';
        $task->finished_at = now();
        $task->save();

        return redirect('/tasks');
    }
}
