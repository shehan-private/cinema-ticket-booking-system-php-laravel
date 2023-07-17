<x-app-layout>
    @section('content')

        <div class="card card-success m-3">
            <div class="card-header">
                <h3 class="card-title">Today Sessions</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dataTable dtr-inline" id="sessions_today">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Tickets Sold (Full)</th>
                            <th>Tickets Sold (Half)</th>
                            <th>Income (Rs.)</th>
                            <th>Live</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($session_dates as $session_date)
                            @if ($session_date['date'] == date('Y-m-d', time()))
                                <tr>
                                    <td></td>
                                    <td>{{$session_date['date']}}</td>
                                    <td>{{$session_date['attend_full']}}</td>
                                    <td>{{$session_date['attend_half']}}</td>
                                    <td>{{$session_date['income']}}</td>
                                    <td>{{$session_date['is_live']}}</td>
                                    <td>
                                        <a href="{{route('session.show', $session_date['date'])}}" class="btn btn-sm btn-primary">View</a>
                                        
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">Scheduled Sessions</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dataTable dtr-inline" id="sessions_schedule">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Tickets Sold (Full)</th>
                            <th>Tickets Sold (Half)</th>
                            <th>Income (Rs.)</th>
                            <th>Live</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($session_dates as $session_date)
                            @if (($session_date['status'] == 'Scheduled') && ($session_date['date'] != date('Y-m-d', time())))
                                <tr>
                                    <td></td>
                                    <td>{{$session_date['date']}}</td>
                                    <td>{{$session_date['attend_full']}}</td>
                                    <td>{{$session_date['attend_half']}}</td>
                                    <td>{{$session_date['income']}}</td>
                                    <td>{{$session_date['is_live']}}</td>
                                    <td>
                                        <a href="{{route('session.show', $session_date['date'])}}" class="btn btn-sm btn-primary">View</a>
                                        
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card card-secondary m-3">
            <div class="card-header">
                <h3 class="card-title">Completed Sessions</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dataTable dtr-inline" id="sessions_complete">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Tickets Sold (Full)</th>
                            <th>Tickets Sold (Half)</th>
                            <th>Income (Rs.)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($session_dates as $session_date)
                            @if (($session_date['status'] == 'Completed') && ($session_date['date'] != date('Y-m-d', time())))
                                <tr>
                                    <td></td>
                                    <td>{{$session_date['date']}}</td>
                                    <td>{{$session_date['attend_full']}}</td>
                                    <td>{{$session_date['attend_half']}}</td>
                                    <td>{{$session_date['income']}}</td>
                                    <td>
                                        <a href="{{route('session.show', $session_date['date'])}}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
    @section('scripts')
    <script>
        let table_today = new DataTable('#sessions_today');
        let table_schedule = new DataTable('#sessions_schedule');
        let table_complete = new DataTable('#sessions_complete');
    </script>
    @endsection
</x-app-layout>
