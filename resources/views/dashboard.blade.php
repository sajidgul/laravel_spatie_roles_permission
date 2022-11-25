<x-app-layout>
    <div class="container py-12">
        <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
          @if(session()->has('Message'))
            <div class="alert alert-success">
              {{ session('Message') }}
            </div>
          @endif
        <div class="card">
            <div class="card-header">
              POST
              @role('writer|admin')
              <a href="{{ route('create') }}" style="float: right; text-decoration:underline;">Add Post</a>
              @endrole
            </div>
            <div class="card-body">
                @foreach ($post as $post)
                <ul class="container" style="list-style-type: disc; color:rgb(105, 199, 236)">
                    <li>
                        <a href="#">{{ $post->title }}</a>
                        @role('editor|admin')
                        <a href="/edit/{{ $post->id }}" style="float: right; text-decoration:underline;">Edit</a>
                        @endrole
                    </li><br>
                </ul>
                @endforeach
            </div>
          </div>
        </div>
          <div class="col-2"></div>
        </div>
        </div>
</x-app-layout>
