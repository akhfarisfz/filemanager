@extends('Admin.Layout.index')
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<a href="/admin/home">
  <button class="btn-dark"><i class="fa fa-angle-left"></i> Back</button>
</a>
<div class="card-deck p-2 mx-auto">
  @php
  $count=0;
  @endphp
  @foreach ($data_user as $users)
  <a href="" data-toggle="modal" data-target="#myModal<?php echo $count; ?>">
    <div class="card-img-top mx-auto d-block" style="width: 17rem;border:1pt solid grey;">
      <img src="data_file/{{ $users->picture;}}" class="card-img-top" alt="image-cap">
      <div class="card-body text-center" style="border:1pt solid grey;">
        <h5 class="card-title">{{ $users->nama_user; }}</h5>
      </div>
    </div>
  </a>
  <div class="modal fade" id="myModal<?php echo $count; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Akses Folder User</h4>
        </div>
        <form action="/ubahakses/{{ $data_user[$count]->id }}/update" method="post"> 
          @csrf
          <div class="modal-body">
            <p>Ini {{ $data_folder[$count]->id }}</p>
            <div class="container">
              <div class="row">
                <div class="col col-lg-2 text-center" style="border: 1pt solid black;">
                  <div class="overflow-auto">
                    <h4>Tahun</h4>
                    @foreach ($data_tahun as $folder)
                    <button type="button" class="btn btn-outline-primary"
                      style="padding:2px 15px 2px 15px;font-size: 16px;">{{ $folder->nama_folder }}</button>
                    @endforeach
                  </div>
                </div>
                <div class="col" style="border: 1pt solid black;">
                  <h4>Nama Folder</h4>
                  @foreach ($data_akses as $folder)
                      <p>
                        <input data-id="{{$folder->id}}" id="{{$folder->nama_folder}}" value="{{ $folder->id }}" name="folder[]"class="toggle-class" type="checkbox" data-on="Active" data-off="InActive" {{ $folder->isAllowed ? 'checked' : '' }}>
                      <label class="toggle-class" for="{{$folder->nama_folder}}">
                      {{ $folder->nama_folder }}
                    </label>
                      </p>
                      @endforeach
                      {{-- <input type="checkbox" name="" id=""> --}}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" >Save Changes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
    <?php $count++; ?>
    @endforeach
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '`http://127.0.0.1:8000/ubahakses/${id_user}/update`',
            data: {
              "users_id":user_id,
              "folders_id": id_folder, 
              "isAllowed": status
            },
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
  // function ubahakses(item,id_folder,id_user){
  // $.ajax({
  //   url:`http://127.0.0.1:8000/ubahakses/${id_user}/update`,
  //   type:"POST",
  //   data:{
  //     "users_id":id_user,
  //     "folders_id": id_folder, 
  //     "isAllowed": item.checked
  //   },
  //   success:(res)=>{
  //     console.log(res);
  //   },
  //   error:(res)=>{
  //     console.log(res);
  //   },
  // });
  // }
</script>
<style>
  .container {
    margin: auto;
  }

  .card-deck a .card {
    border: 1pt solid black;
  }

  .card-deck a .card img {}

  .container a:link {
    color: #000;
  }

  /* unvisited link  */
  .container a:visited {
    color: #000;
  }

  /* visited link    */
  .container a:hover {
    color: #000;
  }

  /* mouse over link */
  .container a:active {
    color: #000;
  }
</style>
@endsection