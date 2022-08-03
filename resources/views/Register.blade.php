<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Login</title>
    <style>
        body{
            background-image: linear-gradient(to right, rgba(0, 230, 244, 0.89), rgba(0, 0, 128, 1));
            width: 100%;
            height: auto;
            overflow-y: scroll;
        }
        .container{
            background: white;
            width: 50%;
            height: auto;
            padding:10px;
            margin-top:calc(100vh/15);
            margin-bottom:calc(100vh/15);
            width:600px;
        }
        .form-floating{
          padding:5px;
        }
    </style>
</head>
<body>
  <div class="container">
      <h1 align="center">Daftar</h1>
        <div class="row align-items-center">
          <form action="/register" method="post">
            @csrf
            <div class="form-floating">
              <input type="name" name="nama_user" class="form-control @error('nama_user') is-invalid @enderror required value="{{ old('nama_user') }}" id="Nama Lengkap" placeholder="Nama Lengkap">
              <label for="Nama Lengkap">Nama Lengkap</label>
                @error('nama_user')
                <div class="invalid-feedback">
                  Isi Nama diatas
                </div>
                @enderror
            </div>
            <div class="form-floating">
              <input type="text" name="nip" class="form-control"  placeholder=" NIP"required value="{{ old('nip') }}">
              <label for="NIP">NIP</label>
            </div>
            <div class="form-floating">
              <input type="text" name="alamat" class="form-control" id="Alamat" placeholder="Alamat" required value="{{ old('alamat') }}">
              <label for="Alamat">Alamat</label>
            </div>
            <div class="form-floating">
              <input type="text" name="unitkerja" class="form-control" id="Unit Kerja" placeholder="Unit Kerja" required value="{{ old('unitkerja') }}">
              <label for="Unit Kerja">Unit Kerja</label>
            </div>
            <div class="form-floating">
              <input type="email" name="email" class="form-control" id="Email" placeholder="Email" @error('email') is-invalid @enderror>
              <label for="Email">Email</label>
            </div>
            <div class="form-floating">
              <input type="tel" name="telepon" class="form-control" id="Nomor Telepon" placeholder="Telepon" >
              <label for="Nomor Telepon">Telepon</label>
            </div>
            <div class="form-floating">
              <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="Password" placeholder="Password">
              <label for="Password">Password</label>
                @error('password')
                  <div class="invalid-feedback">
                    Password tidak sama
                  </div>
                @enderror
            </div>
            <div class="form-floating">
              <input type="password" name="konfirm" class="form-control  @error('password') is-invalid @enderror" id="Konfirmasi_Password" placeholder="Konfirmasi Password">
              <label for="Konfirmasi Password">Konfirmasi Password</label>
              @error('password')
                  <div class="invalid-feedback">
                    Password tidak sama
                  </div>
                @enderror
            </div>
            <p>
              <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
            </p>
            <p>Sudah memiliki akun ? <a href="/">Login disini</a></p>
          </form>
        </div>
    </div>
</body>
</html>