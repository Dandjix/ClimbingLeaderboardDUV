@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Account Page</h1>

    <div class="card mb-4">
        <div class="card-header">
            <span class="row align-items-center">
                @if ($user->admin)
                <i class="mdi mdi-shield mdi-36px px-3"></i>
                @endif 
                <h2>{{ $user->name }}</h2>
            </span>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Score:</strong> {{ number_format($user->score, 1) }}</p>
            
            <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="profile_picture" class="form-label">Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Climbed Blocks</h3>
        </div>
        <div class="card-body">
            @if($user->blocks->isEmpty())
                <p>You haven't climbed any blocks yet!</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Block Name</th>
                            <th>Difficulty</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->blocks as $block)
                            <tr>
                                <td>{{ $block->name }}</td>
                                <td>{{ $block->difficulty }}</td>
                                <td>{{ number_format($block->score, 1) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
