<x-admin-master>
    @section('content')
        <!-- Page Heading -->
    @if(auth()->user()->userHasRole('Admin'))
        <h1 class="h3 mb-4 text-gray-800">Admin Dashboard</h1>
        @endif
        @if(auth()->user()->userHasRole('admin'))
            <h1 class="h3 mb-4 text-gray-800">Not An Admin Dashboard</h1>
        @endif
    @endsection
</x-admin-master>
