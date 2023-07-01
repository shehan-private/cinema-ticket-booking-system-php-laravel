<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">All Movies</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dataTable dtr-inline" id="movies">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Director</th>
                            <th>Producer</th>
                            <th>Writer</th>
                            <th>Genre</th>
                            <th>Duration</th>
                            <th>Trailer</th>
                            <th>Release Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                        <tr>
                            <td>{{$movie->image}}</td>
                            <td>{{$movie->title}}</td>
                            <td>{{$movie->director}}</td>
                            <td>{{$movie->producer}}</td>
                            <td>{{$movie->writer}}</td>
                            <td>{{$movie->genre}}</td>
                            <td>{{$movie->duration}}</td>
                            <td>{{$movie->trailer}}</td>
                            <td>{{$movie->release_date}}</td>
                            <td>{{$movie->status}}</td>
                            <td>
                                <a href="{{route('movie.edit', $movie->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{route('movie.destroy', $movie->id)}}" class="btn btn-sm btn-danger">Delete</a>
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
        let table = new DataTable('#movies');
    </script>
    @endsection
</x-app-layout>
