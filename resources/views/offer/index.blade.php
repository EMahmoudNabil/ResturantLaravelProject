@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
<a href="{{route('offer.create')}}" class="btn btn-success  ">Add offer</a>
</div>
    <div class="card card-default">
        <div class="card-header">
            offer
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($offer as $offers)
                        <tr> <td><img src="{{asset('storage/'.$offers->image)}}"width="120px"  alt="image"> </td>
                            <td>{{$offers->title}}</td>
                            <td>{{$offers->btnDisc}}</td>
                        <td> <a href="{{route('offer.edit',$offers->id)}}" class="btn btn-success float-right ml-2">Edit</a>
                            <a href="" class="btn btn-danger float-right" onclick="handelDelete({{$offers->id}})" data-toggle="modal" data-target="#deleteModel">Delete</a>    </td>
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
                    <h5 class="modal-title" id="deleteModelLongTitle">Delete offer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-bold"> Are you sure want to delete this offer</p>
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
    form1.action='/offer/'+ id;
    $('#deleteModel').modal('show')
}
    </script>
@endsection