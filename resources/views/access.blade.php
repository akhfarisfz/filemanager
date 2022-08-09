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
    }
</style>
@section('container')
<div class="Navbar">
    @php
        $directories = array_map('basename', Storage::directories('public'));
    @endphp
        {{-- @foreach ($directories as $item) --}}
        <p>Drive > {{ $directories[0] }}</p>
        <span>
            @auth
            
        </div>
        @endauth
    {{-- @endforeach --}}
</span>
</div>

@endsection