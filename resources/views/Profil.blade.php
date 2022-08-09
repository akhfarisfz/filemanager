@extends('layouts.main')

<style>
    .Navbar {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin: 5px;
            padding: 5px 50px 0 25px;
            border-bottom: 1px outset;
            font-size: 16px;
            font-weight: bold;
        }

        .judul {
            background: rgba(9, 30, 217, 0.32);
            padding: 15px;
            text-align: center;
            color: rgba(0, 0, 94, 1);
            font-weight: bold;
        }

        .container {
            margin-top: 10px;
            padding: 15px;
            text-align: center;
        }

        .container img {
            border: 1pt black;
            padding: 20px;
        }

        .container button {
            align: center;
        }

        table,
        th,
        td {
            border: 1px solid white;
        }

        table {
            border: none;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            border: none;
        }
            
       
    </style>
@section('container')
<div class="Navbar">
    <p>Profil</p>
</div>

<div class="judul">
    Data User
</div>
<a href="">
    <img src="data_file/{{ auth()->User()->picture }}" width=200px style="border-radius: 50%;">
</a>
<p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Edit Profil
    </button>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah FotoProfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="data_file/{{ auth()->User()->picture }}" width=200px  style="border-radius: 50%;">
                {{-- <label for="input-folder-3">Pilih Gambar</label> --}}
                <div class="file-loading">
                    <input id="input-folder-3" name="input-folder-3" type="file" multiple>
                </div>
                <script>
                    $(document).ready(function () {
                        $("#input-folder-3").fileinput({
                            uploadUrl: "/file-upload-batch/2",
                            hideThumbnailContent: true // hide image, pdf, text or other content in the thumbnail preview
                        });
                    });
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</p>
<table class="tabel">
    <tr>
        <th>NIP</th>
        <th>: {{ auth()->User()->nip }}</th>
    </tr>
    <tr>
        <td>Nama</td>
        <td>: {{ auth()->User()->nama_user }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: {{ auth()->User()->alamat }}</td>
    </tr>
    <tr>
        <td>Nama Unit Kerja</td>
        <td>: {{ auth()->User()->unitkerja }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>: {{ auth()->User()->email }}</td>
    </tr>
    <tr>
        <td>Nomor Telepon</td>
        <td>: {{ auth()->User()->telepon }}</td>
    </tr>
</table>

<div class="container">
    <a href="/home">
        <button class="btn btn-primary"> Kembali </button>
    </a>

</div>
@endsection