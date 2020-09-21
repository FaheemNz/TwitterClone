<div class="card card-tweet mb-2">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('profile', $tweet->user->username) }}" class="mr-2">
                    <img class="rounded-circle" width="45" src="{{ $tweet->user->avatar }}" alt="" />
                </a>
                <div class="ml-2">
                    <a href="{{ route('profile', $tweet->user->username) }}" class="h5 m-0 link">{{ $tweet->user->name }}</a>
                    <div class="text-muted">Miracles Lee Cross</div>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="text-muted mb-2"> <i class="fa fa-clock-o"></i>{{ $tweet->created_at }}</div>
        <p class="card-text">
            {{ $tweet->body }}
        </p>
    </div>
    <x-like-dislike :tweet="$tweet"></x-like-dislike>
</div>