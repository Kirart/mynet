@section('aside')
    <div class="aside">
        <h4>Menu</h4>
        @guest
        @else
            <a href="{{ route('profiles_list') }}">Profiles list</a>
        @endguest
        @show
    </div>
