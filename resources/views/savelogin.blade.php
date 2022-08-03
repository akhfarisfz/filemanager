

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
        }
        .container{
            background: white;
            width: 100%;
            height: auto;
            margin-top:calc(100vh/4);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-5" style="padding:30px;">
                <form>
                    <div class="form-group">
                        <label for="Username">Username</label>
                        <input type="username" class="form-control" id="Username" aria-describedby="emailHelp" placeholder="Enter username">
                        {{-- <small id="Username" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="Password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <p>Regist?<span><a href="/regist">Daftar</a></span></p>
                </form>
            </div>
            <div class="col-1" style="padding:30px 50px 10px;border:1px solid black;">
              <img src="Line 19.png" lenght="5px">
            </div>
            <div class="col-2">
              <img src="logo-kemendagri.png" width="200px">
            </div>
          </div>
        
    </div>
</body>
</html>