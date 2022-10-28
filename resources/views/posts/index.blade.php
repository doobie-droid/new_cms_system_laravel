<x-admin-master>
    @section('content')
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Posts</h1>
    @if(\Illuminate\Support\Facades\Session::has('message'))
        <br>
            <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
        <br>
        @elseif(\Illuminate\Support\Facades\Session::has('creation_message'))
        <br>
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('creation_message')}}</div>
        <br>

        @endif


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Creation Date</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Creation Date</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($posts)
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->user->name}}</td>
                                    <td><a href="{{route('post.edit',$post->id)}}">{{\Illuminate\Support\Str::limit($post->title,'10','...')}}</a> </td>
                                    <td><img height="60px" width="120px"src="{{asset($post->post_image)}}"></td>
                                    <td>{{\Illuminate\Support\Str::limit($post->body,'30','...')}}</td>
                                    <td>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
                                    <td>
                                        @can('view',$post)
                                        <form method="POST" action="{{route('post.destroy',$post->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-sm btn-danger"><i class="fas fa-trash"></i>Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{$posts->links()}}
                </div>
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
