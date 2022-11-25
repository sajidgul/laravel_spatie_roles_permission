<x-app-layout>
    <div class="container py-12">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Edit POST
                    </div>
                    <div class="card-body">
                            <form method="POST" action="{{ route('post.update', $post->id) }}">
                                @csrf
                                @method("PUT")
                                <label for="inputtitle" class="form-label">Title</label>
                                <input type="text" name="title" value="{{ $post->title }}" id="inputtitle" class="form-control"><br>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Write Post</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5" placeholder="Write Your Post">
                                        {{ $post->description }}
                                    </textarea>
                                </div>
                                <button class="btn btn-primary">Update</button>
                            </form>
                    </div>
                </div>
            </div>

            <div class="col-2"></div>
        </div>
    </div>
</x-app-layout>
