@section('aside')
    <div class="aside">
        <h4>Menu</h4>
        @guest
        @else
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profile', \Illuminate\Support\Facades\Auth::id()) }}">My page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profiles_list') }}">Profiles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('requests_list') }}">Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('friend_list') }}">Friends</a>
                </li>
            </ul>
        @endguest
        @show
    </div>
