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
@auth

<div class="Navbar">
    <p>Drive</p>
    <!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	    Upload File
	</button>
    <span>
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
        
				
    </span>
</div>
@foreach ($data_akses as $folder)
<a href="/home/{{ $folder->id}}">  
<div class="content"> 
        <img src="/image 4.png" width=45px>
        <span>{{ $folder->nama_folder }}</span>
        {{-- <span>{{ $ }}</span> --}}
    </div>
</a>
@endforeach
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width = "25%">FILE</th>
            <th>KETERANGAN</th>	
            <th width = "1%">OPSI</th>
        </tr>
    </thead>
    <tbody>
        @foreach($files as $f)
        <tr>
            <td>{{ ($f->file) }}</td>
            <td>{{$f->keterangan}}</td>
            <td>
                <div class="btn-group" >
                    <a class="btn btn-danger" href="/file/hapus/{{ $f->id }}"><span>HAPUS</span></a>
                    <a class="btn btn-success" href="/file/unduh/{{ $f->id }}"><span>UNDUH</span></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }} <br/>
                @endforeach
            </div>
            @endif

            <form action="/file/upload" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <b>File</b><br/>
                    <input type="file" name="file">
                </div>

                <div class="form-group">
                    <b>Keterangan</b>
                    <textarea class="form-control" name="keterangan"></textarea>
                </div>

                <input type="submit" value="Upload" class="btn btn-primary">
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
{{-- <div class="data">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width = "1%">FILE</th>
          <th>KETERANGAN</th>	
          <th width = "1%">OPSI</th>
        </tr>
      </thead>
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
    </table> --}}
@endauth
@endsection