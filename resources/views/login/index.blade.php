<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="components">
        <div class="article">
            <div class="content">
                <div class="main-left">
                    <div class="images">
                        <img class="image" src="../images/login-ins1.jpg" alt="" />
                    </div>
                </div>
                <div class="main-right">
                    <div class="form-login-instagram">
                        <h1>Instagram</h1>
                        <div class="form-container">
                            <form action="{{ route('check-login') }}" method="POST">
                                @csrf
                                <div class="form-col">
                                    <div class="form-row">
                                        <div class="row-input">
                                            <input type="email" class="text-key" placeholder="email" name="email" />
                                        </div>
                                    </div>
                                    @if($errors->has('email'))
                                        <div class="error"><p>{{ $errors->first('email') }}</p></div>
                                    @endif
                                    <div class="form-row">
                                        <div class="row-input">
                                            <input type="password" class="text-key" placeholder="password" name="password" />
                                        </div>
                                    </div>
                                    @if($errors->has('password'))
                                        <div class="error"><p>{{ $errors->first('password') }}</p></div>
                                    @endif
                                    <div class="form-row under-input">
                                        <button type="submit">Log In</button>
                                    </div>
                                    <div class="option-or">
                                        <div class="bar1"></div>
                                        <div class="option">or</div>
                                        <div class="bar1"></div>
                                    </div>
                                    <div class="error">
                                        <p>123</p>
                                    </div>
                                    <a class="forgot-pw" title="">Forgot password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <span>nguyễn thành</span>
            </div>
        </div>
    </div>
</body>
</html>
