<x-admin-master>
    @section('content')
        <h1>User Profile</h1>
        <form method="POST" action="{{route('user.profile.update',$user->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <img height="60px" src="{{$user->avatar}}">
            <br>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror"
                           id="avatar">
                    @error('avatar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>FullName</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror
" id="name"
                           placeholder="Enter your full name here...." value="{{$user->name}}">
                    @error('name')
                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>UserName</label>
                    <input name="username" type="text" class="form-control @error('username') is-invalid @enderror"
                           id="username"
                           value="{{$user->username}}">
                    @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Email Address</label>
                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                           value="{{$user->email}}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           id="password">
                    @error('password')

                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password-confirm">

                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Role_Id</th>
                            <th>Active Role</th>
                            <th>Role Name</th>

                            <th>Attach</th>
                            <th>Detach</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Role_Id</th>
                            <th>Active Role</th>
                            <th>Rotach</th>
                            <th>Detach</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td><input type="checkbox" @if($user->roles->contains($role)) checked @endif></td>
                                <td>{{$role->name}}</td>

                                <td>
                                    <form method="post" action="{{route('role.attach',auth()->user()->id)}}">
                                        @csrf
                                        @method('PATCH')
                                        <input hidden name="user_id" value="{{$user->id}}">
                                        <input hidden name="role_id" value="{{$role->id}}">
                                        <button type="submit" @if($user->roles->contains($role)) disabled @endif class="btn btn-success">Attach
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="{{route('role.detach',auth()->user()->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <input hidden name="user_id" value="{{$user->id}}">
                                        <input hidden name="role_id" value="{{$role->id}}">
                                        <button @if(!$user->roles->contains($role)) disabled @endif type="submit" class="btn btn-danger">Detach
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    @endsection


</x-admin-master>
