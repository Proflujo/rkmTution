<!DOCTYPE html>
<html>
<head>    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>   

    <title></title>
    <style>
        #loginPage{
            margin: 0px;
            background-image: url({{url('/ab2.jpg')}});
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
        }
        .glass-effect {
             background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0)); 
             -webkit-backdrop-filter: blur(20px); 
             backdrop-filter: blur(20px); 
             box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37); 
             border: 1px solig rgba(255, 255, 255, 0.18); 
             border-radius: 32px; 
        }
        .card {
            margin-top: 30%;
        }
    </style>
</head>
<body id="loginPage" >
<div class="vertical-center" >
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card glass-effect">

                    <div class="card-body">

                        <div class="row justify-content-center">
                            <img data-zs-logo="" src="{{ asset('/Logo1.gif') }}" style="height:150px;width:150px;">
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h1 clas="" style="color: white;text-align: center;">{{ ('Login') }}</h1>
                            <div class="row mb-3 mt-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ ('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ ('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-10 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ ('Login') }}
                                    </button>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>