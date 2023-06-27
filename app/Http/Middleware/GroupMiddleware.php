<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GroupMiddleware
{
    public function handle($request, Closure $next, $requiredGroupId)
    {
        $userGroupId = session('group_id');
        if (!$userGroupId || $userGroupId != $requiredGroupId) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
