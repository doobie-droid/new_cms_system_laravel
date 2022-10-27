<x-admin-master>
    @section('content')
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

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
                            <td>{{$post->title}}</td>
                            <td><img class="img-thumbnail" src="{{asset($post->post_image)}}"></td>
                            <td>{{\Illuminate\Support\Str::limit($post->body,'50','...')}}</td>
                            <td>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
                            <td></td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
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
