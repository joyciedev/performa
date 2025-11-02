<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.base')
    <div class="d-flex flex-column w-100 bg-background">
        <div class="d-flex flex-column align-items-start m-auto">
            <h4 class="d-flex align-items-start">Login</h4>

            <p class="d-flex align-items-start mb-5">Welcome back, please enter your new details</p>

            <form action="{{ route('password.reset.final') }}" method="POST" class="d-flex align-items-center flex-column w-100">
                @csrf
                <div class="d-flex align-items-start flex-column w-100 mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input-login" placeholder="Enter your email">
                </div>

                <div class="d-flex align-items-start flex-column w-100 mb-4">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" class="input-login" placeholder="Enter your new password">
                </div>

                <div class="d-flex align-items-start flex-column w-100 mb-4">
                    <label for="password">Confirm New Password</label>
                    <input type="password" name="password" id="password" class="input-login" placeholder="Confirm your new password">
                </div>

                <div class="d-flex align-items-center w-100 mb-2">
                    <button type="submit" class="btn-submit m-auto">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
