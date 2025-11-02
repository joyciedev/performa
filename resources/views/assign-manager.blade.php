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
    <div class="container">
    <h2>Assigner un manager à un agent</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('assign.manager') }}">
        @csrf

        <div class="mb-3">
            <label for="agent_id" class="form-label">Sélectionner un agent</label>
            <select name="agent_id" class="form-control" required>
                @foreach ($agents as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="manager_id" class="form-label">Sélectionner un manager</label>
            <select name="manager_id" class="form-control" required>
                @foreach ($managers as $manager)
                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Assigner</button>
    </form>
</div>
</body>
</html>
