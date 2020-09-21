<h3>Friends</h3>

<ul class="list-group">
    @forelse( auth()->user()->follows as $user )
    <a href="{{ route('profile', $user->username) }}" class="list-group-item link avatar-list d-flex align-items-center">
        <img src="{{ $user->avatar }}" class="avatar mr-3" alt="" />
        <span>{{ $user->name }}</span>
    </a>
    @empty
    <div>No friends...</div>
    @endforelse
</ul>