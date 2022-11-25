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
                <a href="{{ route('user.index') }}" class="btn btn-success mb-3">Back to Users</a>
                <ul type='disc'>
                    <li>Name:{{ $users->name }}</li>
                    <li>Email:{{ $users->email }}</li>
                </ul>
            </div>
            <div class="col-3">
            </div>
        </div><br>


        {{-- Roles --}}
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6 pt-3" style="background-color: #D3D3D3!important;">
                <h4 class="mb-3 fw-bold">Roles</h4>
                @if($users->getRoleNames())
                @foreach ($users->getRoleNames() as $role_permission )
                <a onclick="return confirm('Are you sure?')" href="{{ route('user.role.remove', $users->id) }}" class="btn btn-danger mb-3">
                 {{ $role_permission }}
                </a>
                @endforeach          
                @endif      
            </div>
            <div class="col-3">
            </div>
        </div><br>

        {{-- Permissions --}}
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6 pt-3" style="background-color: #D3D3D3!important;">
                <h4 class="mb-3 fw-bold">Permission</h4>
                @if($users->getPermissionsViaRoles())
                @foreach ($users->getPermissionsViaRoles() as $permi )
                <a onclick="return confirm('Are you sure?')" href="{{ route('user.permission.revoke', $users->id) }}" class="btn btn-danger mb-3">
                 {{ $permi->name }}
                </a>
                @endforeach          
                @endif 
                {{-- <form method="POST" action="{{ route('user.givepermission', $users->id )}}">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Permissions</label>
                      <select  name="permission" class="form-select">
                        @foreach ($permissions as $permissions)
                        <option hidden selected>Select Permissions</option>
                            <option  value="{{ $permissions->name }}">{{ $permissions->name }}</option>
                        @endforeach
                      </select>
                      @error('name')
                        <span style="color:red;">{{ $message }}</span>
                      @enderror
                    </div>
                    <button class="btn btn-primary mb-3">Assign</button>
                </form> --}}
            </div>
            <div class="col-3">
            </div>
        </div><br>



        <div class="row">
          <div class="col-3">
          </div>
          <div class="col-6 pt-3" style="background-color: #D3D3D3!important;">
           
            <form method="POST" action="{{ route('user.assignRole', $users->id) }}">
              @csrf
              <div class="mb-3">
                <h4 class="mb-3 fw-bold">Add New Role</h4>
                <select name="role" class="form-select">
                  <option hidden selected>Select Roles</option>
                  @foreach ($roles as $roles)
                      <option value="{{ $roles->name }}">{{ $roles->name }}</option>
                  @endforeach
                </select>
                @error('name')
                  <span style="color:red;">{{ $message }}</span>
                @enderror
              </div>
              <button class="btn btn-primary mb-3">Assign</button>
          </form>
          </div>
          <div class="col-3">
          </div>
      </div><br>
       
    </div>
</x-app-layout>