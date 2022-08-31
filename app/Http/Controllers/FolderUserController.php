<?php

namespace App\Http\Controllers;

use App\Models\folder_user;
use App\Http\Requests\Storefolder_userRequest;
use App\Http\Requests\Updatefolder_userRequest;

class FolderUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Storefolder_userRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storefolder_userRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\folder_user  $folder_user
     * @return \Illuminate\Http\Response
     */
    public function show(folder_user $folder_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\folder_user  $folder_user
     * @return \Illuminate\Http\Response
     */
    public function edit(folder_user $folder_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatefolder_userRequest  $request
     * @param  \App\Models\folder_user  $folder_user
     * @return \Illuminate\Http\Response
     */
    public function update(Updatefolder_userRequest $request, folder_user $folder_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\folder_user  $folder_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(folder_user $folder_user)
    {
        //
    }
}
