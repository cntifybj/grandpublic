<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Comment;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.pages.comment.index');
    }

    public function fetch_resource()
    {
        $datas = [];
        foreach (Comment::with('parent')->get() as $comment) {
            $row = $comment->toArray();

            $video = Video::find($row['video_id']);
            $row['video_title'] = $video->title;

            $user = User::find($row['user_id']);
            $row['user_name'] = $user ? $user->fullName() : 'N/A';

            $datas[] = $row;
        }

        return response()->json(['data' => $datas], 200);
    }

    public function changeDeletedStatus(Request $request) {

        $instance = Comment::findOrFail($request->input('id'));
        $instance->deleted = $request->input('deleted') == '1' ? 1 : 0;
        $instance->save();
        return response()->json();
    }
}
