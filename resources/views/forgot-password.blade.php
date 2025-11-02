<!DOCTYPE html>
<html lang="en">
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
            <h4 class="d-flex align-items-start">Continue with Email</h4>

            <form action="{{ route('password.send.code') }}" method="POST" class="d-flex align-items-center flex-column w-100">

                @csrf
                <div class="d-flex align-items-start flex-column w-100 mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input-login" placeholder="Enter your email">
                </div>

                <div class="d-flex align-items-center w-100 mb-2">
                    <button type="submit" class="btn-submit m-auto">Continue</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
