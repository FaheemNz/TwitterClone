<x-app>

    @section('content')

    <div class="profile-container">
        <div class="position-relative">
            <img class="profile-cover" src="{{ asset('cover.jpg') }}" alt="" />
            <img src="{{ $user->avatar }}" class="profile-photo rounded-circle" alt="" />
        </div>
        <div class="profile-meta mt-3 d-flex justify-content-between align-items-center">
            <div>
                <h5 class="font-weight-bold">{{ $user->name }}</h5>
                <div>Joined {{ $user->created_at }}</div>
            </div>
            <div class="d-flex">
                @can('edit', $user)
                <a href="{{ route('profile.edit', $user->username) }}" class="btn btn-primary btn-rounded mr-1">Edit Profile</a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>
        <div class="mt-4 text-center">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores optio soluta laudantium sunt, blanditiis temporibus, et necessitatibus, vero sapiente magnam ipsa officia. Similique cum repellat eius excepturi nesciunt exercitationem fuga!
        </div>
    </div>

 
    
    @include('partials._timeline', ['tweets' => $user->tweets])

    @endsection

</x-app>