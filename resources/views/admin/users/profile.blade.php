<x-admin-master>
    @section('content')
        <h1>User Profile</h1>
        <form method="POST" action="{{route('user.profile.update',auth()->user()->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <img   height="60px"  src="{{auth()->user()->avatar}}">
            <br>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" id="avatar">
                    @error('avatar')
                    <div class="invalid-feedback" >{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>FullName</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror
" id="name"
                           placeholder="Enter your full name here...." value="{{auth()->user()->name}}">
                    @error('name')
                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>UserName</label>
                    <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                           value="{{auth()->user()->username}}">
                    @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Email Address</label>
                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                           value="{{auth()->user()->email}}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                    @error('password')

                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation"   class="form-control" id="password-confirm">

                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection
</x-admin-master>
