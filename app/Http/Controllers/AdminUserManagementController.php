<?php

namespace App\Http\Controllers;

use App\Models\userManagement;
use Illuminate\Http\Request;

class AdminUserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Usermanagement');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function show(userManagement $userManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(userManagement $userManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userManagement $userManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(userManagement $userManagement)
    {
        //
    }
}
