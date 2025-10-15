<?php

namespace App\Http\Middleware;

use App\Models\StaffMember;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $staff_id = $request->cookie('staff_member_id');
        if ($staff_id) {
            $staff_member = StaffMember::find($staff_id);
            if ($staff_member && !$staff_member->suspended)
                return $next($request);
        } else {
            return redirect()->route('backoffice.auth.login');
        }
    }
}
