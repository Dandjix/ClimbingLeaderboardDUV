@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Climbing Leaderboard</h1>

        <!-- Display the top users -->
        <h2>Top Climbers</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>User</th>
                    <th>Climbs</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topUsers as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->blocks_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Display the user's climbing progress -->
        <h2 class="mt-5">Your Progress</h2>
        <div class="row">
            @foreach($blocks as $block)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $block->name }}</h5>
                            <p class="card-text">{{ $block->description }}</p>
                            <p><strong>Difficulty:</strong> {{ $block->difficulty }}</p>

                            <!-- Show if the user has climbed the block -->
                            @if(in_array($block->id, $climbedBlocks))
                                <span class="badge bg-success">Climbed</span>
                            @else
                                <span class="badge bg-secondary">Not Climbed</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
