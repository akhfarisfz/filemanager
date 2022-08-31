@extends('Admin.Layout.index')
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="/admin/home">
  <button class="btn-dark"><i class="fa fa-angle-left"></i>  Back</button>
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
  <style>
  </style>
  <div class="modal fade" id="myModal<?php echo $count; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Akses Folder User</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post">
          <div class="container">
            <div class="row" >
              <div class="col col-lg-2 text-center" style="border: 1pt solid black;">
                <div class="overflow-auto">
                <h4>Tahun</h4>
                @foreach ($data_tahun as $folder)
                    <button type="button" class="btn btn-outline-primary" style="padding:2px 15px 2px 15px;font-size: 16px;margin:2px;">{{ $folder->nama_folder }}</button>
                    @endforeach
                  </div>
              </div>
              <div class="col" style="border: 1pt solid black;">
                  <h4>Nama Folder</h4>
                  @foreach ($data_folder as $folder)                      
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="folder" name="folder[]" value="{{ $folder->id }}" {{ old('folder')== 1? 'checked':'' }} >
                    <label class="form-check-label" for="folder">
                      {{ $folder->nama_folder }}
                    </label>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" data-dismiss="modal">Save Changes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php $count++; ?>
  @endforeach

</div>

<style>
  .container {
    margin: auto;
  }

  .card-deck a .card {
    border: 1pt solid black;
  }

  .card-deck a .card img {}

  .container a:link    {color:#000;}  /* unvisited link  */
    .container a:visited {color:#000;}  /* visited link    */
    .container a:hover   {color:#000;}  /* mouse over link */
    .container a:active  {color:#000;}
</style>
<script>
  if (isset($_POST['folder'])) {

$folder=$_POST['folder'];
echo "<br>";
for ($i=0; $i < count($folder) ; $i++){
    echo $folder[$i]."<br>";
}
}
</script>
@endsection