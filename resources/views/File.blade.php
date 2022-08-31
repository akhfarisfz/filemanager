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

</style>

@section('container')
<div class="Navbar">
    <p>Drive</p>
    <span>
        @auth
        @csrf
        <div class="dropdown">
            <a href=""> 
                <span>Hello, {{ auth()->User()->nama_user }}</span>
                <img src="/bxs_user-circle.png" width=40px>
            </a>
            <div class="dropdown-list">
                <a href="/profil">Edit Profil</a>
                <a href="/">Log out</a>
            </div>
        </div>
        @endauth
    </span>
</div>
<div class="row">
	<div class="container">
		
		<div class="col-lg-8 mx-auto my-5">	
			<h4 class="my-5">Data</h4>
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
		</div>
	</div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Upload File
  </button>
  
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
@endsection