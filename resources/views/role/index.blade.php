<x-app-layout>
    <div class="container p-5">
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6">
                    @if(session()->has('Message'))
                      <div class="alert alert-success">
                        {{ session('Message') }}
                      </div>
                    @endif
                <table class="table table-striped">
                    <a href="{{ route('role.create') }}" class="btn btn-success" style="float: right">Create Role</a>
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                      <tr>
                        <th scope="row"></th>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary">Edit</a>
                            <a  onclick="return confirm('Are you sure?')" href="{{ route('role.deleted', $role->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</x-app-layout>