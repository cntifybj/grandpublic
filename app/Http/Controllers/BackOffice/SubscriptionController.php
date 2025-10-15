<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.pages.subscription.index');
    }


    public function fetch_resource()
    {
        return response()->json(['data' => Subscription::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscriptionRequest $request)
    {
        $newest = Subscription::create($request->validated());
        if ($newest) {
            return response()->json(['message' => 'New Subscription successfully created'], 200);
        } else {
            return response()->json(['errors' => ['general' => ['Error on creating of a new Subscription']]], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        if ($subscription->update($request->validated())) {
            return response()->json(['message' => 'Infos successfully modified'], 200);
        } else {
            return response()->json(['errors' => ['general' => ['Error on updating Subscription']]], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $subscription_id)
    {
        if (Subscription::destroy($subscription_id)) {
            return response()->json(['message' => 'Subscription successfully deleted'], 200);
        } else {
            return response()->json(['message' => 'Error on removing Subscription'], 500);
        }
    }
}
