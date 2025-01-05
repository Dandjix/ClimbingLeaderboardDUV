@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Climbing Blocks</h1>

        <!-- If user is an admin, show the management options -->
        @if(auth()->user() && auth()->user()->admin)
            <a href="{{ route('blocks.create') }}" class="btn btn-success mb-3">Create New Block</a>
        @endif

        <!-- List of Blocks -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Difficulty</th>
                    <th>Description</th>
                    @if(auth()->user() && auth()->user()->admin)  <!-- Show Actions column only for admins -->
                        <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($blocks as $block)
                    <tr>
                        <td>{{ $block->name }}</td>
                        <td>{{ $block->difficulty }}</td>
                        <td>{{ $block->description }}</td>
                        
                        @if(auth()->user() && auth()->user()->admin) <!-- Show actions only for admins -->
                            <td>
                                <a href="{{ route('blocks.edit', $block->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                <form action="{{ route('blocks.destroy', $block->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this block?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
