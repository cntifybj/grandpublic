<?php

namespace App\Http\Middleware;

use App\Models\StaffMember;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $current_user = StaffMember::find($request->cookie('staff_member_id'));
        if ($current_user->role === 'super_admin')
            return $next($request);
        else
            return redirect()->route('backoffice.index');
    }
}
