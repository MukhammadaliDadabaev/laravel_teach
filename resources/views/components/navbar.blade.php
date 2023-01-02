<nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
  <a href="" class="navbar-brand d-block d-lg-none">
    <h1 class="m-0 display-4 text-primary">BLOG</h1>
  </a>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
    <div class="navbar-nav mr-auto py-0">
      <a href="/" class="nav-item nav-link active">{{__('Bosh sahifa')}}</a>
      <a href="{{ route('about') }}" class="nav-item nav-link">{{__('Biz haqimizda')}}</a>
      <a href="{{ route('services') }}" class="nav-item nav-link">{{__('Hizmatlar')}}</a>
      <a href="{{ route('projects') }}" class="nav-item nav-link">{{__('Loyixalar')}}</a>
      <a href="{{ route('posts.index') }}" class="nav-item nav-link">{{__('Blog')}}</a>
      <a href="{{ route('contact') }}" class="nav-item nav-link">{{__('Aloqa')}}</a>
    </div>
    <!-- lang -->
    @foreach ($all_locales as $locale )
    <a href="{{ route('change.locale', ['locale' => $locale]) }}" class="btn btn-info mr-1 d-none d-lg-block">{{ $locale }}</a>
    @endforeach

    @auth
    @if (!auth()->user()->unreadNotifications()->count() == 0)
    <div class="">
      <a href="{{ route('notifications.index') }}" class="btn position-relative" role="button">
        <svg class="w-7 h-7 position-absolute" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
        </svg>
        <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger text-light">
          {{ auth()->user()->unreadNotifications()->count() }}
        </span>
      </a>
      <a href="#"><b>{{ auth()->user()->name }}</b></a>&nbsp;&nbsp;
    </div>
    @endif
    <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm mr-1 d-none d-lg-block">POST QO'SHISH</a>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button class="btn btn-light mr-1 d-none d-lg-block">CHIQISH</button>
    </form>
    @else
    <a href="{{ route('login') }}" class="btn btn-primary mr-3 d-none d-lg-block">KIRISH</a>
    @endauth
  </div>
</nav>