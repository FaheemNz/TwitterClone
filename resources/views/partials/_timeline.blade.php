@forelse($tweets as $tweet)
    @include('partials._tweet')
@empty
<div>No Tweets...</div>
@endforelse