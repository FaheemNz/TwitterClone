<div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <a href="{{ route('home') }}" class="link">Home</a>
    </li>
    <li class="list-group-item">
      <a href="/explore" class="link">Explore</a>
    </li>
    <li class="list-group-item">Notifications</li>
    <li class="list-group-item">Messages</li>
    <li class="list-group-item">Bookmarks</li>
    <li class="list-group-item">Lists</li>
    <li class="list-group-item">
      <a href="{{ route('profile', auth()->user()->username) }}" class="link">Profile</a>
    </li>
    <li class="list-group-item">More</li>
  </ul>
</div>