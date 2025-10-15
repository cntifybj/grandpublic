<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\StaffMember;
use DateTime;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('backoffice.pages.auth.login');
    }

    public function do_login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $instance = StaffMember::whereEmail($email)->first();

        if ($instance && decrypt($instance->password) === $password) {
            if ($instance->suspended) {
                return redirect()->back()->withErrors(['login' => 'Ce compte a été suspendu']);
            }

            if (!$instance->first_login) {
                $instance->first_login = new DateTime();
                $instance->save();
            }

            if ($request->has('remember')) {
                $cookie = cookie('staff_member_id', $instance->id, 60 * 24 * 31); // cookie d'authentification
            } else {
                $cookie = cookie('staff_member_id', $instance->id, 60 * 12); // cookie d'authentification
            }

            return redirect()->route('backoffice.index')->withCookie($cookie);
        }

        return redirect()->back()->withErrors(['login' => 'Identifiants incorrects']);
    }

    public function do_logout(): RedirectResponse
    {
        $cookie = cookie('staff_member_id', 0, -1); // cookie d'authentification
        return redirect()->route('backoffice.auth.login')->withoutCookie($cookie);
    }


    public function profile(): View
    {
        return view('backoffice.pages.auth.profile');
    }
}
