@if( !auth()->user()->is($user) )
<form method="POST" action="{{ route('follow', $user->username) }}">
    @csrf
    <button type="submit" class="btn btn-info btn-rounded">
        {{ auth()->user()->following($user) ? 'Unfollow' : 'Follow' }}
    </button>
</form>
@endif