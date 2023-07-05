<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">Add Movie</h3>
            </div>
            <form method="POST">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="search">Search Movie</label>
                                <input type="text" class="form-control" id="search" placeholder="Movie name.." name="search">
                                <a class="mt-2 btn btn-info " id="search-btn" href="">Search</a>
                                                                
                            </div>
                        </div>
                        <div class="col-6"></div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <div class="mt-2 d-block" id="result-image"></div>
                            </div>
                        </div>
                        <div class="col-8">
                            <table id="search-dataTable" class="d-none table table-sm">
                                <tbody>
                                    <tr>
                                        <td class="w-25"><div style="font-weight: bold" class="mt-2 d-none search-objects">Title</div></td>
                                        <td><div class="mt-2 d-none" id="search-title"></div></td>
                                    </tr>
                                    <tr>
                                        <td><div style="font-weight: bold" class="mt-2 d-none search-objects">Year</div></td>
                                        <td><div class="mt-2 d-none" id="search-year"></div></td>
                                    </tr>
                                    <tr>
                                        <td><div style="font-weight: bold" class="mt-2 d-none search-objects">Released Date</div></td>
                                        <td><div class="mt-2 d-none" id="search-released"></div></td>
                                    </tr>
                                    <tr>
                                        <td><div style="font-weight: bold" class="mt-2 d-none search-objects">Run Time</div></td>
                                        <td><div class="mt-2 d-none" id="search-runtime"></div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <a class="mt-2 btn btn-success d-none" type="button" id="grab-btn" href="">Grab Data</a>
                        
                    </div>

                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Movie Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Movie title" name="title"> 
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="director">Director</label>
                                <input type="text" class="form-control" id="director" placeholder="Director" name="director"> 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="writer">Writer</label>
                                <input type="text" class="form-control" id="writer" placeholder="Writer" name="writer"> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="actors">Actors</label>
                                <input type="text" class="form-control" id="actors" placeholder="Actors" name="actors"> 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <input type="text" class="form-control" id="duration" placeholder="Duration" name="duration"> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <input type="text" class="form-control" id="genre" placeholder="Genre" name="genre"> 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="imdbRating">IMDB Rating</label>
                                <input type="text" class="form-control" id="imdbRating" placeholder="IMDB Rating" name="imdbRating"> 
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="storyline">Story Line</label>
                        <textarea class="form-control" name="storyline" id="storyline" placeholder="storyline" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="text" class="form-control" id="image" placeholder="Image URL" name="image"> 
                    </div>

                    <div class="form-group">
                        <label for="trailer">Trailer</label>
                        <input type="text" class="form-control" id="trailer" placeholder="Trailer URL" name="trailer"> 
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option>Select Status</option>
                                    <option>Now Showing</option>
                                    <option>Up Coming</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            
                        </div>
                    </div>
                
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="p-2 btn btn-danger d-none" id="clear-btn" href="">Clear Data</a>
                </div>
            </form>
        </div>

        <script>
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
                                $("#clear-btn").addClass("d-inline").removeClass("d-none")

                                $("#search-dataTable").addClass("d-block").removeClass("d-none")

                                $(".search-objects").addClass("d-block").removeClass("d-none")

                                $("#search-title").html(result_title).addClass("d-block").removeClass("d-none")
                                $("#search-year").html(result_year).addClass("d-block").removeClass("d-none")
                                $("#search-released").html(result_released).addClass("d-block").removeClass("d-none")
                                $("#search-runtime").html(result_runtime).addClass("d-block").removeClass("d-none")


                            } else {
                                result_image = "No data found"
                                
                                $("#grab-btn").addClass("d-none").removeClass("d-inline")
                                $("#clear-btn").addClass("d-none").removeClass("d-inline")

                                $("#search-dataTable").addClass("d-none").removeClass("d-block")

                                $(".search-objects").addClass("d-none").removeClass("d-block")

                                $("#search-title").addClass("d-none").removeClass("d-block")
                                $("#search-year").addClass("d-none").removeClass("d-block")
                                $("#search-released").addClass("d-none").removeClass("d-block")
                                $("#search-runtime").addClass("d-none").removeClass("d-block")

                                $("#result").html(result_image)
                               
                                
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
                        }
                    })
                })
            })

        </script>


    @endsection
</x-app-layout>
