<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
            <h3 class="card-title">Add Class</h3>
            </div>
            <form method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Class Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Class name" name="name"> 
                            </div> 
                        </div>
                        <div class="col-6">
                        </div>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
    @endsection
</x-app-layout>
