<x-admin-master>

    @section('content')
        <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Post Title</label>
                <input name="title" type="text" class="form-control" id="title"
                       placeholder="Enter the title of your Post">

                @error('title')
                <br>
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="post_image">Post Image</label>
                <input type="file" name="post_image" class="form-control" id="post_image">
                @error('post_image')
                <br>
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="body">Post Content</label>
                <textarea name="body" rows="8" class="form-control" id="body"
                          placeholder="Enter the content of your post"></textarea>
                @error('body')
                <br>
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection


</x-admin-master>
