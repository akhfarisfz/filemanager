<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Folder_user;
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Models\userManagement;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminUserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_user=null)
    {
        $data_user= User::where('role','user')->get()->sortBy("id");
        // $data_user= User::where('role','user')->get()->sortBy("id");
        $data_folder=Folder::whereNotNull('parent_id')->get()->sortBy("name_folder");
        $data_tahun=Folder::where('parent_id',null)->get()->sortBy("name_folder");
        $data_akses = DB::table('folder_users')
              ->join('users', 'folder_users.users_id', '=', 'users.id')
              ->rightjoin('folders', 'folder_users.folders_id', '=', 'folders.id')
              ->whereNotNUll('parent_id')
              ->get()->sortBy("nama_folder");
        // dd($data_akses);
            return view('Admin/Usermanagement',[
                    'tittle'=>'User',
                    'data_folder'=>$data_folder,
                    'data_tahun'=>$data_tahun,
                    'data_user'=> $data_user,
                    'data_akses'=>$data_akses
                ]);
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
