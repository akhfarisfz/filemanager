@extends('Admin.Layout.index')
@section('container')
<div class="d-flex justify-content-around">
    <div class="card text-center" style="width:40%">
        <a href="/managementfile" class="stretched-link">
            <img class="card-img-top" src="/image 35.png" alt="Card image"  style="width:50%">
            <p>Manajemen Folder</p>
        </a>
    </div>
    <div class="card text-center" style="width:40%">
        <a href="/usermanagement" class="stretched-link">
            <img class="card-img-top" src="/image 34.png" alt="Card image"  style="width:50%">
            <p>Manajemen Users</p>
        </a>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="logout">
    <a href="/logout">
        <button class="btn-dark"><i class="fa fa-arrow-right-from-bracket"></i>  Logout</button>
      </a>
</div>
@endsection
<style>
    .container{
        margin: calc(100%/8) calc(100%/6) 50% 50%;
    }
    .container   p{
            color:black;
            font-weight:bold;
            font-size:24px;
        }
        .container   a:link {
            text-decoration: none;
        }

        .container   a:visited {
            text-decoration: none;
        }
        .container   a:hover {
            text-decoration: underline;
        }
        .container   a:active {
            text-decoration: underline;
        }
</style>