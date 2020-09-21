<x-app>
    @section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mb-4">Update Your Profile</h3>
            @if($errors->any())
            @foreach($errors as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
            @endif

            @if(session()->has('success'))
            <li class="text-success">Profile Updated Successfully...</li>
            <br />
            @endif

            <form enctype="multipart/form-data" class="border shadow p-3" action="{{ route('profile.update', $user->username) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" value="{{ $user->username }}" type="text" class="form-control" required />
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" value="{{ $user->name }}" type="text" class="form-control" required />
                </div>

                <div class="mb-3">
                    <div>
                        <label for="avatar" class="mr-2">Choose a Picture</label>
                        <img src="{{ $user->avatar }}" class="avatar" alt="" />
                    </div>
                    <div class="custom-file mt-2">
                        <input name="avatar" type="file" class="custom-file-input" id="avatar">
                        <label class="custom-file-label" for="avatar"></label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" value="{{ $user->email }}" type="text" class="form-control" required />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" required />
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control" required />
                </div>

                <div class="form-group text-right mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
    @endsection
</x-app>