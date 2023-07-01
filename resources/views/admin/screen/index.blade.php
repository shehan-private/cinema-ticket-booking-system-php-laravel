<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">All Screens</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dataTable dtr-inline" id="screens">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Screen Name</th>
                            <th>Class</th>
                            <th>Capacity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="d-none">{{$i=0}}</div>
                        @foreach ($screens as $screen)
                        <tr>
                            <td>{{++$i}}</td>
                            <th>{{$screen->name}}</th>
                            <td>{{$classModels->where('id', $screen->classModel_id)->first()->name}}</td>
                            <td>{{$screen->capacity}}</td>
                            
                            <td>
                                <a href="{{route('screen.edit', $screen->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('screen.destroy', $screen->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
    @section('scripts')
    <script>
        let table = new DataTable('#screens');
    </script>
    @endsection
</x-app-layout>
