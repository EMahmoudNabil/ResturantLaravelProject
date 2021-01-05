@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
<a href="{{route('chef.create')}}" class="btn btn-success  ">Add chef</a>
</div>
    <div class="card card-default">
        <div class="card-header">
            chef
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Job</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($chef as $chefs)
                        <tr> <td><img src="{{asset('storage/'.$chefs->image)}}"width="120px"  alt="image"> </td>
                            <td>{{$chefs->name}}</td>
                            <td>{{$chefs->job}}</td>
                        <td> <a href="{{route('chef.edit',$chefs->id)}}" class="btn btn-success float-right ml-2">Edit</a>
                            <a href="" class="btn btn-danger float-right" onclick="handelDelete({{$chefs->id}})" data-toggle="modal" data-target="#deleteModel">Delete</a>    </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>


        <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="deleteModelCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="" method="POST" id="deleteNavbarForm">
            @csrf
          @method('Delete')

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModelLongTitle">Delete chef</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-bold"> Are you sure want to delete this chef</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No,go back</button>
                    <button type="submit" class="btn btn-danger">Yes,Delete</button>
                </div>
                </div>
        </form>
            </div>
            </div>



        </div>
    </div>
@endsection

@section('scripts')
    <script>


function  handelDelete(id){
    var form1 =document.getElementById('deleteNavbarForm');
    form1.action='/chef/'+ id;
    $('#deleteModel').modal('show')
}
    </script>
@endsection