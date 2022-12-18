<nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
  <a href="" class="navbar-brand d-block d-lg-none">
    <h1 class="m-0 display-4 text-primary">BLOG</h1>
  </a>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
    <div class="navbar-nav mr-auto py-0">
      <a href="/" class="nav-item nav-link active">Home</a>
      <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
      <a href="{{ route('services') }}" class="nav-item nav-link">Service</a>
      <a href="{{ route('projects') }}" class="nav-item nav-link">Project</a>
      <a href="{{ route('posts.index') }}" class="nav-item nav-link">Blog</a>
      <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
    </div>
    @auth
    <a href="#"><b>{{ auth()->user()->name }}</b></a>&nbsp;&nbsp;
    <a href="{{ route('posts.create') }}" class="btn btn-primary mr-3 d-none d-lg-block">POST QO'SHISH</a>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button class="btn btn-light mr-3 d-none d-lg-block">CHIQISH</button>
    </form>
    @else
    <a href="{{ route('login') }}" class="btn btn-primary mr-3 d-none d-lg-block">KIRISH</a>
    @endauth
  </div>
</nav>