<x-app-layout>
    <div class="container p-5">
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6  pt-3 bg-light">
                <a href="{{ route('role.index') }}" class="btn btn-success mb-3">Back to Role</a>
                <form method="POST" action="{{ route('role.store') }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="textexample" class="form-label">Post Name</label>
                      <input type="text" name="name" class="form-control" id="textexample">
                      @error('name')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror
                    </div>
                    <button class="btn btn-primary mb-3">create</button>
                </form>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</x-app-layout>