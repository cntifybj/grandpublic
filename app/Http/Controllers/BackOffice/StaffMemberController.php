<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffMemberRequest;
use App\Http\Requests\UpdateStaffMemberRequest;
use App\Models\StaffMember;
use DateTime;
use Exception;

class StaffMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.pages.staff.index');
    }


    public function fetch_resource()
    {
        $decryptedDatas = [];

        foreach (StaffMember::all() as $staffMember) {
            $staffMember = $staffMember->toArray();
            $staffMember['password'] = decrypt($staffMember['password']);
            $decryptedDatas[] = $staffMember;
        }

        return response()->json(['data' => $decryptedDatas], 200);
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
    public function store(StoreStaffMemberRequest $request)
    {
        $newest = StaffMember::create($request->validationData());
        if ($newest) {
            return response()->json(['message' => 'New Staff member successfully created'], 200);
        } else {
            return response()->json(['errors' => ['general' => ['Error on creating of a new Staff member']]], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffMember $staffMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffMember $staffMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffMemberRequest $request, int $staff)
    {
        if (StaffMember::whereId($staff)->update($request->validationData())) {
            return response()->json(['message' => 'Infos successfully modified'], 200);
        } else {
            return response()->json(['errors' => ['general' => ['Error on updating Staff member']]], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffMember $staffMember)
    {
        //
    }


    /**
     * Suspendre un compte administrateur (StaffMember)
     */
    public function stop(int $id)
    {
        $instance = StaffMember::findOrFail($id);

        $instance->suspended = true;
        $instance->updated_at = new DateTime();
        $instance->save();

        return response()->json(['message' => 'Staff member has been successfully suspended'], 200);
    }


    /**
     * Rétablir un compte administrateur (StaffMember)
     */
    public function restore(int $id)
    {
        $instance = StaffMember::findOrFail($id);

        $instance->suspended = true;
        $instance->updated_at = new DateTime();
        $instance->save();

        return response()->json(['message' => 'Staff member has been successfully restored'], 200);
    }
}
