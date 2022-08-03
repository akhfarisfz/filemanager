@extends('layouts.main')

    <style>
         
        .Navbar{
            display: flex;
            justify-content: space-between;
            width:100%;
            margin:10px;
            /* padding:10px 50px 5px 25px; */
            border-bottom:1px outset;
            font-size:24px;
            font-weight: bold;
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

    </style>
@section('container')
<div class="Navbar">
    <p>Drive</p>
    <span>
        <div class="dropdown">
            <a href="">
                <img src="/bxs_user-circle.png" width=40px>
            </a>
            <div class="dropdown-list">
                <a href="/profil">Edit Profil</a>
                <a href="/">Log out</a>
            </div>
        </div>
    </span>
</div>
<div class="content">
    <a href="">
        <img src="/image 4.png" width=40px>
        <span> 2021</span>
    </a>
</div>
<div class="content">
    <a href="">
        <img src="/image 4.png" width=40px>
        <span> 2022</span>
    </a>
</div>
<div class="content">
    <a href="">
        <img src="/image 4.png" width=40px>
        <span> 2023</span>
    </a>
</div>
@endsection