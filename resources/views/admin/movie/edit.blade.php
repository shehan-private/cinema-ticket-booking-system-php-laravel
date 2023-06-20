<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
            <h3 class="card-title">Add Movie</h3>
            </div>
            <form method="POST">
                @csrf
                @method('PATCH')
                <div class="card-body">

                    <div class="form-group">
                        <label for="title">Movie Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Movie title" name="title" value="{{$movie->title}}"> 
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="director">Director</label>
                                <input type="text" class="form-control" id="director" placeholder="Director" name="director" value="{{$movie->director}}"> 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="producer">Producer</label>
                                <input type="text" class="form-control" id="producer" placeholder="Producer" name="producer" value="{{$movie->producer}}"> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="writer">Writer</label>
                                <input type="text" class="form-control" id="writer" placeholder="Writer" name="writer" value="{{$movie->writer}}"> 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <input type="text" class="form-control" id="duration" placeholder="Duration" name="duration" value="{{$movie->duration}}"> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <input type="text" class="form-control" id="genre" placeholder="Genre" name="genre" value="{{$movie->genre}}"> 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                {{-- <label for="duration">Duration</label>
                                <input type="text" class="form-control" id="duration" placeholder="Duration" name="duration">  --}}
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="storyline">Story Line</label>
                        <textarea class="form-control" name="storyline" id="storyline" placeholder="storyline" rows="5">{{$movie->storyline}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="text" class="form-control" id="image" placeholder="Image URL" name="image" value="{{$movie->image}}"> 
                    </div>

                    <div class="form-group">
                        <label for="trailer">Trailer</label>
                        <input type="text" class="form-control" id="trailer" placeholder="Trailer URL" name="trailer" value="{{$movie->trailer}}"> 
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option>Select Status</option>
                                    <option>Now Showing</option>
                                    <option>Up Coming</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="release_date">Release Date</label>
                                <input type="date" class="form-control" id="release_date" placeholder="Release Date" name="release_date" value="{{$movie->release_date}}"> 
                            </div>
                        </div>
                    </div>
  
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
    @endsection
</x-app-layout>