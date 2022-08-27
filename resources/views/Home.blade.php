@extends('layouts.main')

    <style>
        .Navbar{
            display: flex;
            justify-content: space-between;
            width:100%;
            margin:10px;
            border-bottom:1px outset;
            font-size:24px;
            font-weight: bold;
        }
        .Navbar span{
            font-size: 16pt;
            color: black;
        }
        .Navbar span a:link {
            text-decoration: none;
        }

        .Navbar span a:visited {
            text-decoration: none;
        }
        .Navbar span a:hover {
            text-decoration: underline;
        }
        .Navbar span a:active {
            text-decoration: underline;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-list {
            display: none;
            position: absolute;
            right:20px;
            top:30px;
            text-align: center;
            background-color: #f1f1f1;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius:10px;
        }
        .dropdown-list a {
            color: black;
            padding: 12px;
            font-size:16px;
            justify:center;
            text-decoration: none;
            display: block;
        }
        .dropdown-list a:hover {background-color: #ddd;}
        .dropdown:hover .dropdown-list {display: block;}
        .dropdown:hover .dropbtn {background-color: #3e8e41;}

        .content{
            padding: 10px;
        }
        .content{
            border-bottom: 1px solid black;
            display: flex;
            /* justify-content: space-between;  */
        }
    </style>
@section('container')

<div class="Navbar">
    <p>Drive</p>
    <span>
        @auth
        @csrf
        <div class="dropdown">
            <a href=""> 
                <span>Hello, {{ auth()->User()->nama_user }}</span>
                <img src="/data_file/{{ auth()->User()->picture }}" width=40px style="border-radius: 50%;">
            </a>
            <div class="dropdown-list">
                <a href="/profil">Edit Profil</a>
                <a href="/logout">Log out</a>
            </div>
        </div>
        @endauth
    </span>
</div>

@foreach ($data as $folder)
<a href="/home/{{ $folder['id']}}">  
<div class="content"> 
        <img src="/image 4.png" width=45px>
        <span>{{ $folder['nama_folder'] }}</span>
        {{-- <span>{{ $ }}</span> --}}
    </div>
</a>
@endforeach
<div class="data">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width = "1%">FILE</th>
          <th>KETERANGAN</th>	
          <th width = "1%">OPSI</th>
        </tr>
      </thead>
      {{-- @foreach ($data as $item)           --}}
      <tbody>
        <tr>
          <td>File</td>
          <td>Keterangan</td>
          <td>
            <div class="btn-group" >
              <a class="btn btn-danger" href=""><span>HAPUS</span></a>
              <a class="btn btn-success" href=""><span>UNDUH</span></a>
            </div>
          </td>
        </tr>
      </tbody>
      {{-- @endforeach --}}
    </table>
@endsection