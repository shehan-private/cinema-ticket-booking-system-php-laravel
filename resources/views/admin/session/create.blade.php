<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">Add Session</h3>
            </div>
            <form method="POST">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="Movie title" name="date">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-9">  
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="screen">Screen</label>
                                <select class="form-control" name="screen">
                                    <option>Select Screen</option>
                                    @foreach ($screens as $screen)
                                        <option value={{$screen->id}}>{{$screen->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-9">  
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th>Time</th>
                                    <th>Movie</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <div class="table_body"></div>
                                @for ($i=0; $i<6; $i++)
                                    <tr>
                                        <td>
                                            <select class="form-control" name="time[]">
                                                <option>Select Time</option>
                                                @foreach ($times as $time)
                                                    <option value={{$time->id}}>{{$time->time}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="movie[]">
                                                <option>Select movie</option>
                                                @foreach ($movies as $movie)
                                                    <option value={{$movie->id}}>{{$movie->title}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    @endsection
</x-app-layout>
