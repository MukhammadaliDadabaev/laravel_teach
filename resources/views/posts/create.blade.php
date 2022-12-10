<x-layouts.main>

  <x-slot:title>
    Post qo'shish
  </x-slot:title>

  <!-- Page Header Start -->
  <x-page-header>
    Post qo'shish
  </x-page-header>
  <!-- Page Header End -->

  <!-- Contact Start -->
  <div class="container-fluid py-3">
    <div class="container">
      <div class="row align-items-end mb-4">
      </div>
      <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0 mx-auto">
          <div class="contact-form">
            <div id="success"></div>

            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="control-group">
                <input type="text" class="form-control p-4" name="title" value="{{ old('title') }}" placeholder="Sarlavha" />
                @error('title')
                <p class="help-block text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="control-group my-3">
                <textarea class="form-control p-4" rows="2" name="short_content" placeholder="Maqola mazmuni">{{ old('short_content') }}</textarea>
                @error('short_content')
                <p class="help-block text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="control-group">
                <textarea class="form-control p-4" rows="6" name="content" placeholder="Maqolalar">{{ old('content') }}</textarea>
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
                <button class="btn btn-primary btn-block py-3 px-5" type="submit">Saqlash</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact End -->

</x-layouts.main>