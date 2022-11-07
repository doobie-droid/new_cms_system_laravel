<x-admin-master>
    @section('content')
        <h1>User Profile</h1>
        <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="file" name="avatar" class="form-control" id="avatar">

                </div>
                @error('avatar')
                <br>
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>FullName</label>
                    <input name="name" type="text" class="form-control" id="name"
                           placeholder="Enter your full name here....">

                </div>
                @error('name')
                <br>
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>UserName</label>
                    <input name="username" type="text" class="form-control" id="username"
                           placeholder="Enter your username here....">

                </div>
                @error('username')
                <br>
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Email Address</label>
                    <input name="email" type="text" class="form-control" id="email"
                           placeholder="Enter your email address here....">

                </div>
                @error('email')
                <br>
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                @error('password')
                <br>
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" name="password-confirmation" class="form-control" id="password-confirmation">

                </div>
                @error('password-confirmation')
                <br>
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection
</x-admin-master>
