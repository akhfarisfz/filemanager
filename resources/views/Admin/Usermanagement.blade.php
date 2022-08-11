@extends('Admin.Layout.index')
@section('container')
@php
$users = App\Models\User::all();

@endphp
<div class="card-deck p-2 mx-auto">
<?php
    for ($i=0; $i < count($users); $i++) {
?>
    <a href="">
        <div class="card-img-top mx-auto d-block" style="width: 17rem;">
            <img src="data_file/{{ $users[$i]->picture;}}" class="card-img-top" alt="image-cap">
            <div class="card-body text-center">
                {{-- dd($item); --}}
                <h5 class="card-title">{{ $users[$i]->nama_user; }}</h5>
            </div>
        </div>
    </a>
    {{-- <span> </span> --}}
<?php
    }
    ?>
</div>
<style>
    .container{
        margin: auto;
    }
    .card-deck a .card{
         border: 1pt solid black;
    }
    .card-deck a .card img{
    }
</style>
@endsection