<x-admin-master>

    @section('content')

        <div class="row">
            <div class="col-sm-4">
                <form action="{{route('role.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" id="name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                <button class="btn btn-primary" type="submit">Add Role</button>
                </form>

            </div>
            @if(!$roles->isEmpty())
                <div class="card-body col-sm-8">
                    <div class="table-responsive">
                        @if(\Illuminate\Support\Facades\Session::has('message'))

                            <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
                            toastr["success"]("My name is Inigo Montoya. You killed my father. Prepare to die!")
}}

                        @endif
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Delete</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->slug}}</td>
                                    <td>
                                        <form method="post" action="{{route('role.destroy',$role->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            @endif
        </div>

    @endsection

</x-admin-master>
