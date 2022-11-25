<x-app-layout>
    <div class="container py-12">
        <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
        <div class="card">
            <div class="card-header">
              Add POST
            </div>
            <div class="card-body">
                <form action="/" method="POST">
                  @csrf
                  <label for="inputtitle" class="form-label">Title</label>
                <input type="text" name="title" id="inputtitle" class="form-control"><br>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Write Post</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5" placeholder="Write Your Post"></textarea>
                </div>
                <button class="btn btn-success">Submit</button> 
                </form> 
            </div>
          </div>
        </div>
          <div class="col-2"></div>
        </div>
        </div>
</x-app-layout>