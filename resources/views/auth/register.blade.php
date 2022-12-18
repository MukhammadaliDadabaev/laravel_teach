<x-layouts.auth>
  <div class="container">
    <div class="row">
      <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
        <div class="panel border bg-white">
          <div class="panel-heading">
            <h3 class="pt-3 font-weight-bold">Ro'yhatdan o'tish</h3>
          </div>
          <div class="panel-body p-3">
            <form action="{{ route('register_store') }}" method="POST">
              @csrf
              <div class="form-group">
                <div class="input-field">
                  <span class="far fa-user p-2"></span>
                  <input type="text" name="name" placeholder="Ismingiz..." required>
                </div>
              </div>
              <div class="form-group py-1">
                <div class="input-field">
                  <span class="far fa-user p-2"></span>
                  <input type="text" name="email" placeholder="Email..." required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-field">
                  <span class="fas fa-lock px-2"></span>
                  <input type="password" name="password" placeholder="Parolni kiriting..." required>
                  <button class="btn bg-white text-muted">
                    <span class="far fa-eye-slash"></span>
                  </button>
                </div>
              </div>
              <div class="form-group py-1 pb-2">
                <div class="input-field">
                  <span class="fas fa-lock px-2"></span>
                  <input type="password" name="password_confirmation" placeholder="Parolni tasdiqlang..." required>
                  <button class="btn bg-white text-muted">
                    <span class="far fa-eye-slash"></span>
                  </button>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block mt-3">YUBORISH</button>
              <div class="text-center pt-4 text-muted">
                Hisobingiz yo'q?
                <a href="{{ route('login') }}">KIRISH</a>
              </div>
            </form>
          </div>
          <div class="mx-3 my-2 py-2 bordert">
            <div class="text-center py-3"> <a href="https://wwww.facebook.com" target="_blank" class="px-2"> <img src="https://www.dpreview.com/files/p/articles/4698742202/facebook.jpeg" alt=""> </a> <a href="https://www.google.com" target="_blank" class="px-2"> <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png" alt=""> </a> <a href="https://github.com/MukhammadaliDadabaev" target="_blank" class="px-2"> <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png" alt=""> </a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layouts.auth>