@extends('Admin.Layout.index')
@section('container')

@php 
use App\Models\Folder;
$directories = array_map('basename', Storage::directories('public'));
$directorySelect = array();
    foreach( $directories as $directory ) :
    $directorySelect[$directory] = $directory;
    endforeach; 
@endphp
  <a href="" data-toggle="modal" data-target="#myModal">
    <div class="card-text-right" style="width: 17rem;">
        <img src="/fluent_folder-add-48-filled.png" width="35px">
    </div>
  </a>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Folder</h4>
        </div>
        <div class="modal-body">
          <div class="row align-items-center">
            <form action="<?php echo url("/Files/{$parent_id}"); ?>" method="post">
              @csrf
              <div class="form-group">
                <label for="nama_folder">Nama_Folder</label>
                <input type="text" name="nama_folder" class="form-control" id="nama_folder" required >
              </div>
              <div class="form-group">
                <label for="comment">Deskripsi</label>
                <textarea class="form-control" rows="5" id="comment"></textarea>
              </div>
              <div class="button">
                  <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@foreach ($data as $folder)
@php
    $directorySelect[$directory] = $directory;
@endphp 
  
<div class="content"> 
    <a href="/Files/{{ $folder['id']}}">  
        <img src="/image 4.png" width=45px>
        <span>{{ $folder['nama_folder'] }}</span>
        <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="/dots.png" width="20px">
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Rename</a>
          <a class="dropdown-item" href="#">Delete</a>
        </div>
    </a>
</div>
<style>
    .content{
        border-bottom: 1px solid gray;
        padding: 5px;
        display: flex;
        justify-content: space-between;
    }
    .content a .setting{
      float: right 
    }
</style>

@endforeach
@endsection