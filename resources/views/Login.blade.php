<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><title>Login</title>
    <style>
        body{
            background-image: linear-gradient(to right, rgba(0, 230, 244, 0.89), rgba(0, 0, 128, 1));
            width: 100%;
            height: auto;
        }
        .container{
            padding:40px 60px 40px 40px;
            background: white;
            border-radius: 20px;
            width: 50%;
            margin:auto;
            height: auto;
            margin-top:calc(100vh/5);
        }
        .row align-items-center{
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }
        .container-fluid .container .col{
            border-left: 1px solid rgba(0, 230, 244, 0.89);
        }
        .container-fluid .container .col .center{
            display: block;
            margin-left: auto;
            margin-right: auto;
            /* width: 50%; */
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md" style="padding:30px;">
                    <h1>Login</h1>
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
    
                    @if(session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
    
                    <form action="/login" method="post">
                        @csrf
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Enter email" @error('email') is-invalid @enderror autofocus required>
                            <label for="floatingInput">Enter email</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password">
                            <label for="floatingInput">Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <p>Regist?<span><a href="/register">Daftar</a></span></p>
                    </form>
                </div>
                <div class="col" style="10px 150px;align:center ">
                    <img src="logo-kemendagri.png" width="60%" class="center">
                    <h3 align="center">Sistem File Manager</h3>
                    <h4 align="center">Kementerian Dalam Negeri</h4>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>