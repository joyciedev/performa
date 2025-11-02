<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    @extends('layouts.base')
    <div class="d-flex flex-column w-100 bg-background">
        <div class="d-flex flex-column align-items-start m-auto">
                @if ($errors->has('emailPassword'))
                <span class="text-danger">{{ $errors->first('emailPassword') }}</span>
                @endif
            <h4 class="d-flex align-items-start">Login</h4>

            <p class="d-flex align-items-start mb-5">Welcome back, please enter your details</p>

            <form action="{{ route('login-fn') }} " method="POST" class="d-flex align-items-center flex-column w-100">
                @csrf
                <div class="d-flex align-items-start flex-column w-100 mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input-login" placeholder="Enter your email">
                     @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                </div>

                <div class="d-flex align-items-start flex-column w-100 mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="input-login" placeholder="Enter your password">
                     @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                </div>

                <div class="d-flex align-items-start w-100 mb-5">
                    <a href="{{ route('forgot-password')}}" class="link">Forgot your password ?</a>
                </div>

                <div class="d-flex align-items-center w-100 mb-2">
                    <button type="submit" class="btn-submit m-auto">Login</button>
                </div>

                <div class="d-flex align-items-center justify-content-center w-100">
                    <span>You don't have an account ? <a href="#" class="link">Sign Up</a></span>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
