<x-app-layout>
    <div class="container p-5">
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6  pt-3" style="background-color: #D3D3D3!important;">
                @if(session()->has('Message'))
                <div class="alert alert-success">
                  {{ session('Message') }}
                </div>
              @endif
                <a href="{{ route('role.index') }}" class="btn btn-success mb-3">Back to Role Assigned</a>
                <form method="POST" action="{{ route('role.update', $role->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="textexample" class="form-label">Rule Name</label>
                      <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="textexample">
                      @error('name')
                        <span style="color:red;">{{ $message }}</span>
                      @enderror
                    </div>
                    <button class="btn btn-primary mb-3">Update Role</button>
                </form>
            </div>
            <div class="col-3">
            </div>
        </div>
        </div>
</x-app-layout>