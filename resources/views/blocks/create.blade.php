@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Create a New Block</h1>

        <form action="{{ route('blocks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Block Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="difficulty">Difficulty</label>
                <input type="number" class="form-control" id="difficulty" name="difficulty" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Block</button>
        </form>
    </div>
@endsection
