<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Models\UserSubscription;
use Carbon\Carbon;

class UserSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.pages.user_subscription.index');
    }

    public function fetch_resource()
    {
        $datas = [];
        foreach (UserSubscription::all() as $user_subscription) {
            $row = $user_subscription->toArray();

            $user = User::find($row['user_id']);
            if ($user) {
                $row['user_name'] = $user->fullName();
            }
            $row['amount_paid'] = number_format($row['amount_paid'] ?? 0, 0, '.', ' ');

            $start_date = Carbon::create($row['start_date']);
            $end_date = Carbon::create($row['end_date']);
            $homeController = new HomeController;

            $row['duration'] = $homeController->formatToYearMonth($start_date->diffInMonths($end_date));


            $row['start_date'] = $start_date->format('d F Y');
            $row['end_date'] = $end_date->format('d F Y');

            $datas[] = $row;
        }

        return response()->json(['data' => $datas], 200);
    }
}
