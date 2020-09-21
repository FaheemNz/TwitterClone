<div class="card is-rounded border-primary">
    <form method="POST" action="{{ route('tweets') }}" class="card-body">
        @csrf
        <div class="form-group">
            <label class="sr-only" for="body">post</label>
            <textarea required class="form-control post-textarea" name="body" id="body" rows="3" placeholder="What are you thinking?"></textarea>
        </div>
        <hr />
        <div class="mt- d-flex justify-content-between">
            <img src="{{ auth()->user()->avatar }}" class="avatar" alt="Avatar" />
            <button type="submit" class="btn btn-rounded btn-primary">Tweet</button>
        </div>
    </form>

    @error( 'body' )
    <li class="text-danger p-3">{{ $message }}</li>
    @enderror
</div>