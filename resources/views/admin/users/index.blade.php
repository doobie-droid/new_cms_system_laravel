<x-admin-master>
    @section('content')
        <h1>Users List</h1>
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <br>
            <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
            <br>
        @endif

        <!-- DataTales Example -->
        @if($users)
        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Profile Picture</th>
                            <th>Name</th>
                            <th>Registered Date</th>
                            <th>Last Updated On</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Profile Picture</th>
                            <th>Name</th>
                            <th>Registered Date</th>
                            <th>Last Updated On</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
@foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->username}}</td>
                                    <td><img height="60px" src="{{$user->avatar}}"></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</td>
                                    <td>
                                        <form method="POST" action="{{route('user.destroy',$user->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
@endforeach
                        </tbody>
                    </table>
{{--                    {{$posts->links()}}--}}
                </div>
            </div>
        </div>
        @else
            <h1>Sorry, there are no users currently available</h1>
            @endif($users)
        <div class="d-flex">
            <div class="mx-auto">
            </div>
        </div>
@endsection

        @section('scripts')
            <!-- Page level plugins -->
            <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

                    <!-- Page level custom scripts -->
                    <script src="{{asset('js/datatables/datatables-demo.js')}}"></script>
        @endsection
</x-admin-master>
