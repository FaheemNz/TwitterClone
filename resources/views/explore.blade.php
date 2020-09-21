<x-app>

    @section('content')
    <article class="row">
        @foreach($users as $user)
        <div class="col-lg-4 col-sm-6 col-xl-3">
            <div class="card mb-2">
                <img class="card-img-top" src="{{ $user->avatar }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis, nulla?</p>
                    <a href="{{ route('profile', $user->username) }}" class="btn btn-primary">Visit Profile</a>
                </div>
            </div>
        </div>
        @endforeach
    </article>

    @endsection

</x-app>