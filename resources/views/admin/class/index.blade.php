<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">All Classes</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dataTable dtr-inline" id="classes">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Class Name</th>
                            <th>Facilities</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="d-none">{{$i=0}}</div>
                        @foreach ($classModels as $classModel)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$classModel->name}}</td>
                            <td></td>
                            <td>
                                <a href="{{route('class.edit', $classModel->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{route('class.destroy', $classModel->id)}}" class="btn btn-sm btn-danger">Delete</a>
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
        let table = new DataTable('#classes');
    </script>
    @endsection
</x-app-layout>
