<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="/">Danny Learns Laravel</a>
  <div class="collapse navbar-collapse" id="navbarCollapse">

    <!-- left side -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/blog">Blog<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/tasks">Tasks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
      </li>
    </ul> <!-- end left side -->

    <!-- right side -->
    <ul class="navbar-nav ml-auto">
      @if (Auth::check())
        <li class="nav-item">
          <a class="nav-link">Hi, {{ Auth::user()->name }}!</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
      @endif
    </ul> <!-- end right side -->

  </div>
</nav>
