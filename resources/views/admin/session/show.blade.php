<x-app-layout>
    @section('content')

        <div class="card card-success m-3">
            <div class="card-header">
                <h3 class="card-title">Sessions Details</h3>
            </div>
            <div class="card-body">
                <h4 class="card-text">{{$sessions[0]->date}}</h4>
                <table class="table table-bordered table-striped dataTable dtr-inline" id="sessions">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Screen</th>
                            <th>Time</th>
                            <th>Movie</th>
                            <th>Tickets Sold (Full)</th>
                            <th>Tickets Sold (Half)</th>
                            <th>Income (Rs.)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="d-none">{{$i=0}}</div>
                        @foreach ($sessions as $session)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$screens->where('id', $session->screen_id)->first()->name}}</td>
                                <td>{{$times->where('id', $session->time_id)->first()->time}}</td>
                                <td>{{$movies->where('id', $session->movie_id)->first()->title}}</td>
                                <td>{{$session->attend_full}}</td>
                                <td>{{$session->attend_half}}</td>
                                <td>{{$session->income}}</td>
                                <td>
                                    <a href="{{route('session.edit', $session->screen_id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('session.destroy', $session->screen_id)}}" class="btn btn-danger">Delete</a>
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
        let table = new DataTable('#sessions');
    </script>
    @endsection
</x-app-layout>
