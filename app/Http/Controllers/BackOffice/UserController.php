<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::withCount([
            'likes as liked_videos' => function ($query) {
                $query->whereNotNull('video_id');
            },
            'comments',
            'payments as paid_videos' => function ($query) {
                $query->whereNotNull('video_id');
            },
            'payments as total_spent' => function ($query) {
                $query->select(DB::raw('SUM(amount)'));
            },
        ])->get();

        return view('backoffice.pages.user.index', compact('users'));
    }

}
