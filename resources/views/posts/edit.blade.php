<x-layouts.main>

  <x-slot:title>
    Posts-Edit
  </x-slot:title>

  <!-- Page Header Start -->
  <x-page-header>
    Postni o'zgartirish #{{ $post->id }}
  </x-page-header>
  <!-- Page Header End -->

  <div class="container-fluid py-3">
    <div class="container">
      <div class="row align-items-end mb-4">
      </div>
      <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0 mx-auto">
          <div class="contact-form">
            <div id="success"></div>

            <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="control-group">
                <input type="text" class="form-control p-4" name="title" value="{{ $post->title }}" placeholder="Sarlavha" />
                @error('title')
                <p class="help-block text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="control-group my-3">
                <textarea class="form-control p-4" rows="2" name="short_content" placeholder="Maqola mazmuni">{{ $post->short_content }}</textarea>
                @error('short_content')
                <p class="help-block text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="control-group">
                <textarea class="form-control p-4" rows="6" name="content" placeholder="Maqolalar">{{ $post->content }}</textarea>
                @error('content')
                <p class="help-block text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="my-3">
                <input type="file" name="photo" placeholder="Rasm" />
                @error('photo')
                <p class="help-block text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div>
                <button class="btn btn-primary btn-inline px-5" type="submit">SAQLASH</button>
                <a class="btn btn-danger text-right" href="{{ route('posts.show', ['post' => $post->id]) }}">BEKOR QILISH</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</x-layouts.main>