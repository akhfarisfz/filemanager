@extends('Admin.Layout.index')
@section('container')
@php
$users = App\Models\User::all();

@endphp
<div class="card-deck p-2 mx-auto">
<?php
    for ($i=0; $i < count($users); $i++) {
?>
    <a href="" data-toggle="modal" data-target="#myModal">
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
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
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