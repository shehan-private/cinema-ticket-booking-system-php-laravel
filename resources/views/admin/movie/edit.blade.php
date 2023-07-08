<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">Edit Movie</h3>
            </div>
            <form method="POST">
                @csrf
                @method('PATCH')

                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Movie Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Movie title" name="title" value="{{$movie->title}}" required> 
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="director">Director</label>
                                <input type="text" class="form-control" id="director" placeholder="Director" name="director" value="{{$movie->director}}" required> 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="writer">Writer</label>
                                <input type="text" class="form-control" id="writer" placeholder="Writer" name="writer" value="{{$movie->writer}}" required> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="actors">Actors</label>
                                <input type="text" class="form-control" id="actors" placeholder="Actors" name="actors" value="{{$movie->actors}}"> 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <input type="text" class="form-control" id="duration" placeholder="Duration" name="duration" value="{{$movie->duration}}" required> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <input type="text" class="form-control" id="genre" placeholder="Genre" name="genre" value="{{$movie->genre}}" required> 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="imdbRating">IMDB Rating</label>
                                <input type="text" class="form-control" id="imdbRating" placeholder="IMDB Rating" name="imdbRating" value="{{$movie->imdbRating}}"> 
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="storyline">Story Line</label>
                        <textarea class="form-control" name="storyline" id="storyline" placeholder="storyline" rows="5" required>{{$movie->storyline}}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option>Select Status</option>
                                    <option>Now Showing</option>
                                    <option>Coming Soon</option>
                                    <option>Completed</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="initial_screening">Initial Screening Date</label>
                                <input type="date" class="form-control" id="initial_screening" placeholder="Image URL" name="initial_screening" value="{{$movie->initial_screening}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="trailer">Movie Trailer</label>
                        <input type="text" class="form-control" id="trailer" placeholder="Movie trailer youtube link" name="trailer" value="{{$movie->trailer}}" required>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="landscape_image">Landscape Image</label>
                                <div style="border-color: #CED4DA; border-radius: 5px; border-width: 1px;" id="landscapeImageDrop" class="dropzone {{$movie->landscape_image ? 'd-none' :''}}"></div>
                                <br>
                                <x-img-prev src="{{asset('storage/'.$movie->landscape_image)}}" class="{{$movie->landscape_image ? '' : 'd-none'}}" id="movieImageShow" ></x-img-prev>
                                <input type="hidden" class="form-control" id="landscape_image" name="landscape_image" value="{{$movie->landscape_image}}">
                                
                            </div>
                        </div>
                        <div class="col-6">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="portrait_image">Portrait Image</label>
                                <div id="portraitImageDrop" class="dropzone"></div>
                                <input type="hidden" class="form-control" id="portrait_image" name="portrait_image">
                            </div>
                        </div>
                        <div class="col-6">
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="p-1.95 btn btn-danger" id="clear-btn" href="">Clear Data</a>
                </div>
            </form>
        </div>

        {{-- <script>
            $(document).ready(function(){
                var apikey = "1d206fe6"

                var result_image = ``
                var result_title = ``
                var result_year = ``
                var result_released = ``
                var result_runtime = ``

                $("#search-btn").click(function(event){
                    event.preventDefault()

                    var movie = $("#search").val()

                    var url = "http://www.omdbapi.com/?apikey="+apikey

                    // var result = '<img style="float:left" class="img-thumnail" width="200" height="200"'
                    // 
                    
                    $.ajax({
                        method:'GET',
                        url:url+"&t="+movie,
                        success:function(data){
                            console.log(data)

                            if (data.Response != 'False'){
                                result_image = `
                                <img class="img-thumnail" width="200" height="200" src="${data.Poster}"/>

                                `
                                result_title = `<div style="font-weight: bold">${data.Title}</div>`
                                result_year = `<div style="font-weight: bold">${data.Year}</div>`
                                result_released = `<div style="font-weight: bold">${data.Released}</div>`
                                result_runtime = `<div style="font-weight: bold">${data.Runtime}</div>`
                                
                                
                                $("#result-image").html(result_image)
                                $("#grab-btn").addClass("d-inline").removeClass("d-none")
                                // $("#clear-btn").addClass("d-inline").removeClass("d-none")

                                $("#search-dataTable").addClass("d-block").removeClass("d-none")

                                $(".search-objects").addClass("d-block").removeClass("d-none")

                                $("#search-title").html(result_title).addClass("d-block").removeClass("d-none")
                                $("#search-year").html(result_year).addClass("d-block").removeClass("d-none")
                                $("#search-released").html(result_released).addClass("d-block").removeClass("d-none")
                                $("#search-runtime").html(result_runtime).addClass("d-block").removeClass("d-none")


                            } else {
                                result_image = "No data found"

                                $("#result-image").html(result_image)                            
                                $("#grab-btn").addClass("d-none").removeClass("d-inline")
                                // $("#clear-btn").addClass("d-none").removeClass("d-inline")

                                $("#search-dataTable").addClass("d-none").removeClass("d-block")

                                $(".search-objects").addClass("d-none").removeClass("d-block")

                                $("#search-title").addClass("d-none").removeClass("d-block")
                                $("#search-year").addClass("d-none").removeClass("d-block")
                                $("#search-released").addClass("d-none").removeClass("d-block")
                                $("#search-runtime").addClass("d-none").removeClass("d-block")

                            }

                            $("#grab-btn").click(function(event){
                                event.preventDefault()
                                $("#title").val(data.Title)
                                $("#director").val(data.Director)
                                $("#writer").val(data.Writer)
                                $("#actors").val(data.Actors)
                                $("#duration").val(data.Runtime)
                                $("#genre").val(data.Genre)
                                $("#imdbRating").val(data.imdbRating)
                                $("#storyline").val(data.Plot)
                                
                            })
                        }
                    })

                    $("#clear-btn").click(function(event){
                        event.preventDefault()
                        $("#title").val("")
                        $("#director").val("")
                        $("#writer").val("")
                        $("#actors").val("")
                        $("#duration").val("")
                        $("#genre").val("")
                        $("#imdbRating").val("")
                        $("#storyline").val("")
                        $("#status").val("Select Status")
                    })

                })
            })

        </script> --}}

        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

        <script>
            Dropzone.autoDiscover = false;

            $("#landscapeImageDrop").dropzone({ 
                url: '{{route('movie.image.upload')}}',
                maxFileSize: 3,
                acceptedFiles: 'image/*',
                paramName: 'image',
                init: function() {
                    this.on ('sending', function(file, xhr, formData){
                        formData.append('_token', '{{csrf_token()}}');
                    });

                    this.on ('success', function(file, response) {
                        console.log (response);
                        if (response.status) {
                            $('#landscape_image').val(response.image); //Assigning path called image coming from the json
                            notyf.success('Image uploaded successfully');
                        } else {
                            notyf.error('Something went wrong');
                        }
                        
                    });
                }
            });

            // $("#portraitImageDrop").dropzone({ url: "/file/post" });

            $("#movieImageShow .remove-btn").on('click', function() {
                console.log('Remove button clicked');
                $('#landscape_image').val('');
                $('#movieImageShow').addClass('d-none');
                $('#landscapeImageDrop').removeClass('d-none');
            });

        </script>


    @endsection
</x-app-layout>
