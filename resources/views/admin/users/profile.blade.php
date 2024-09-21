<h1>My Profile</h1>
<img class="img-md rounded-circle" src="{{ asset('adminassets/images/avatar-default.svg') }}" alt="Profile image"
    width="80" height="80" />
<p>Welcome, {{ Auth::user()->user_name }}!</p>
<p>Email: {{ Auth::user()->email }}</p>
