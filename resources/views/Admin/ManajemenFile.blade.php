@extends('Admin.Layout.index')
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
<div class="nav">
  <a href="/admin/home">
    <button class="btn-dark"><i class="fa fa-angle-left"></i>  Back</button>
  </a>
  <a href="" data-toggle="modal" data-target="#myModal">
    <div class="card-text-right" style="width: 17rem;">
        <img src="/fluent_folder-add-48-filled.png" width="35px">
    </div>
    {{-- <h4>Upload File</h4> --}}
  </a>
  <div class="buttonModal">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="buttonModal">
      Upload File
    </button>
  </div>
</div>  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Folder</h4>
        </div>
        <div class="modal-body">
          <div class="row align-items-center">
            <form action="<?php echo url("/managementfile/{$parent_id}"); ?>" method="post">
              @csrf
              <div class="form-group">
                <label for="nama_folder">Nama_Folder</label>
                <input type="text" name="nama_folder" class="form-control" @error('nama_folder') is-invalid @enderror id="nama_folder" required >
              </div>
              @error('nama_user')
                <div class="alert alert-danger">
                  Nama folder sudah ada !
                </div>
                @enderror
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
<div class="content"> 
    <a href="/managementfile/{{ $folder['id']}}">  
        <img src="/image 4.png" width=45px>
        <span>{{ $folder['nama_folder'] }}</span>
        {{-- Tambah Folder Modal --}}
        <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="/dots.png" width="20px">
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modal">Rename</a>
          <a class="dropdown-item" href="/managementfile/delete/{{ $folder['id'] }}" >Delete</a>
        </div>
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Rename</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/managementfile/rename/{{ $folder['id'] }}" method="post">
        @csrf
        <div class="modal-body">
            <label for="nama_folder">Nama Folder</label>
            <input type="text" name="nama_folder" class="form-control" id="nama_folder" required >
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
{{-- 
<div class="data">
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
</div> --}}

{{-- <script>
  $(document).ready(function(){

  })
  $(document).ready(function(){
    $.ajax({
      
    })
    if($admin == null){
      $('#buttonModal').hide();
    }else{
      $('#buttonModal').show();
    }
  });
</script> --}}
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
    
    .content a:link    {color:#000;}  /* unvisited link  */
    .content a:visited {color:#000;}  /* visited link    */
    .content a:hover   {color:#000;}  /* mouse over link */
    .content a:active  {color:#000;}
</style>

@endsection