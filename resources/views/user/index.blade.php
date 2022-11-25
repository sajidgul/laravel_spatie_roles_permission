<x-app-layout>
    <div class="container p-5">
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6">
                @if (session()->has('Message'))
                    <div class="alert alert-success">
                        {{ session('Message') }}
                    </div>
                @endif
                <table class="table table-striped">
                <a href="{{ route('user.createview') }}" class="btn btn-success mb-3" style="float: left;">Create New User</a>
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($user as $users)
                           
                       <tr>
                           <td>{{ $users->name }}</td>
                           <td>{{ $users->email }}</td>
                           <td>
                               <a href="{{ route('user.role.show', $users->id) }}" class="btn btn-primary">Roles</a>
                               <a onclick="return confirm('Are you sure?')"
                               href="{{ route('user.destroy', $users->id) }}" class="btn btn-danger">Delete</a>
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
