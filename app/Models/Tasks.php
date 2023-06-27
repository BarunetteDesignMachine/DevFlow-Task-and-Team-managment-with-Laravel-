<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    public function username()
    {
        return $this->attributes['username'];
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'assigned_to', 'id')->with('username');
    }
    protected $fillable = [
        'title',
        'content',
        'assigned_to',
        'deadline',
        'status',
        'group_id',
    ];

    public function create(array $attributes)
    {
        $task = new Tasks;
        $task->fill($attributes);
        $task->save();

        return $task;
    }
    public function scopeWhereHasGroup($query, $group_id)
    {
        return $query->whereHas('group', function ($query) use ($group_id) {
            $query->where('group_id', $group_id);
        });
    }
}
