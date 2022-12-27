<div>
  <h1>Hurmatli {{ $post->user->name }} !</h1>
  <h2>{{ $post->title }}</h2>
  <p>{{ $post->short_content }}</p>
  <p>{{ $post->content }}</p>
  <h3>Post id: {{ $post->id }}</h3>
  <h5>{{ $post->created_at }} da yangi post qo'shildi...</h5>
  <strong>RAHMAT...</strong>
</div>