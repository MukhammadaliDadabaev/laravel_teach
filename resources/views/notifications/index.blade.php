<x-layouts.main>

  <x-slot:title>
    Xabarnoma
  </x-slot:title>

  <!-- Page Header Start -->
  <x-page-header>
    Xabarlar
  </x-page-header>
  <!-- Page Header End -->

  <!-- Blog Start -->
  <div class="container-fluid py-5">
    <div class="container">
      <!-- <div class="row"> -->
      <h1 class="section-title mb-3">Xabarlar</h1>
      @foreach ($notifications as $notification)
      <div class="border mb-3 p-4 rounded">
        <div class="position-relative mb-4">
          <div class="blog-date">
            @if ($notification->read_at == null)
            <h4 class="font-weight-bold mb-n1">New</h4>
            @endif
            <small class="text-white text-uppercase">Jan</small>
          </div>
        </div>
        <div class="d-flex mb-2">
          <a class="text-danger text-uppercase font-weight-medium">{{ $notification->data['created_at'] }}</a>
        </div>
        <h5 class="font-weight-medium mb-2">{{ $notification->data['title'] }}</h5>
        <p class="mb-4">{{ $notification->data['id'] }}</p>
        @if ($notification->read_at == null)
        <a class="btn btn-sm btn-primary py-2" href="{{ route('notifications.read', [$notification->id]) }}">O'qildi</a>
        @endif
      </div>
      @endforeach



      <!-- </div> -->
    </div>
  </div>
  <!-- Blog End -->

</x-layouts.main>