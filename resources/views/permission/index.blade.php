<x-app-layout>
    <div class="container p-5">
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6">
                <table class="table table-striped">
                    <a href="{{ route('permission.create') }}" class="btn btn-success" style="float: right">Create Permission</a>
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                      <tr>
                        <th scope="row"></th>
                        <td>{{ $permission->name }}</td>
                        <td>
                          <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-primary">Edit</a>
                          <a  onclick="return confirm('Are you sure?')" href="{{ route('permission.deleted', $permission->id) }}" class="btn btn-danger">Delete</a>
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