<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>verify-code</title>
</head>
<body>

        @extends('layouts.base')
    <div class="d-flex flex-column w-100 bg-background">
        <div class="d-flex flex-column align-items-start m-auto">
            <h4 class="d-flex align-items-start">Enter code</h4>

            <form action="{{ route('password.verify.code.form') }}" method="POST" class="d-flex align-items-center flex-column w-100">

                @csrf
                <div class="d-flex align-items-start flex-column w-100 mb-4">
                     <input type="hidden" name="email" value="{{ session('email') }}">
                    <label for="code">Entrez le code reçu :</label>
                    <input type="text" name="code" required>
                </div>

                <div class="d-flex align-items-center w-100 mb-2">
                    <button type="submit" class="btn-submit m-auto">enter</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
