<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
            <h3 class="card-title">Add Screen</h3>
            </div>
            <form method="POST">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Screen Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Screen name" name="name" value="{{$screen->name}}"> 
                            </div> 
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="class">Class</label>
                                <select class="form-control" name="class">
                                    <option>Select Class</option>
                                    @foreach ($classModels as $classModel)
                                        <option {{($classModel->id == $screen->classModel_id)?'selected' : ''}} value={{$classModel->id}}>{{$classModel->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="capacity">Capacity</label>
                                <input type="number" class="form-control" id="capacity" placeholder="Capacity" name="capacity" value="{{$screen->capacity}}"> 
                            </div> 
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    @endsection
</x-app-layout>
