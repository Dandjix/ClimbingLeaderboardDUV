@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Climbing Leaderboard</h1>

        <!-- Display the top users -->
        <h2>Top Climbers <i class="mdi mdi-image-filter-hdr"></i> </h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>User</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topUsers as $index => $user)
                    <tr>
                        <td>
                            {{ $user->rank }}
                            @if($user->rank==1)
                                <i class="mdi mdi-medal" style="color:gold;"></i>
                            @elseif($user->rank==2)
                                <i class="mdi mdi-medal" style="color:silver;"></i>
                            @elseif($user->rank==3)
                                <i class="mdi mdi-medal" style="color:#cd7f32;"></i>
                            @endif
                        </td>
                        <td>
                            {{ $user->name }}
                            @if ($user->profile_picture)
                                <img
                                src="{{ asset('storage/' . $user->profile_picture) }}" 
                                alt="PP" 
                                class="rounded-circle" 
                                style="width: 32px; height: 32px; object-fit: cover;">
                            @endif
                        </td>
                        <td>{{ number_format($user->score,1)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Display the user's climbing progress if authenticated -->
        @if(Auth::check())
            <h2 class="mt-5">Your Progress</h2>
            <div class="row">
                @foreach($blocks as $block)
                    <div class="col-md-4">
                        <div class="card mb-4" 
                             style="background-color: {{ in_array($block->id, $climbedBlocks) ? '#d4edda' : '#f8d7da' }}; border: 1px solid {{ in_array($block->id, $climbedBlocks) ? '#c3e6cb' : '#f5c6cb' }};">
                            <div class="card-body">
                                <h5 class="card-title">{{ $block->name }}</h5>
                                <p class="card-text">{{ $block->description }}</p>
                                <p><strong>Difficulty:</strong> {{ $block->difficulty }}</p>

                                <!-- Form for marking/unmarking the block -->
                                <form action="{{ route('toggleClimb', ['blockId' => $block->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-block"
                                        style="background-color: {{ in_array($block->id, $climbedBlocks) ? '#155724' : '#721c24' }}; border: none; color: white;">
                                        <i class="mdi mdi-checkbox-marked-circle-outline"></i> 
                                        {{ in_array($block->id, $climbedBlocks) ? 'Unmark as Climbed' : 'Mark as Climbed' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h2 class="mt-5">Climbing Blocks <i class="mdi mdi-chart-bubble"></i></h2>
            <div class="row">
                @foreach($blocks as $block)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $block->name }}</h5>
                                <p class="card-text">{{ $block->description }}</p>
                                <p><strong>Difficulty:</strong> {{ $block->difficulty }}</p>
                                <!-- No progress shown for unauthenticated users -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Show admin panel link if user is admin -->
        <!-- @if(auth()->user() && auth()->user()->admin)
            <div class="mt-4">
                <h3>Admin Panel</h3>
                <a href="{{ route('blocks.index') }}" class="btn btn-warning">Manage Blocks</a>
            </div>
        @endif -->
    </div>
@endsection
