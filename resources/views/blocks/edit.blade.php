@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Block: {{ $block->name }}</h1>

        <form action="{{ route('blocks.update', $block->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Block Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $block->name }}" required>
            </div>
            <div class="form-group">
                <label for="difficulty">Difficulty</label>
                <input type="number" class="form-control" id="difficulty" name="difficulty" value="{{ $block->difficulty }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $block->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Block</button>
        </form>
    </div>
@endsection
