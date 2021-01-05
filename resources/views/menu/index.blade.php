@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
<a href="{{route('menu.create')}}" class="btn btn-success  ">Add menu</a>
</div>
    <div class="card card-default">
        <div class="card-header">
            menu
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
                    @foreach ($menu as $menus)
                        <tr> <td><img src="{{asset('storage/'.$menus->image)}}"width="120px"  alt="image"> </td>
                            <td>{{$menus->title}}</td>
                            <td>{{$menus->price}}</td>
                        <td> <a href="{{route('menu.edit',$menus->id)}}" class="btn btn-success float-right ml-2">Edit</a>
                            <a href="" class="btn btn-danger float-right" onclick="handelDelete({{$menus->id}})" data-toggle="modal" data-target="#deleteModel">Delete</a>    </td>
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
                    <h5 class="modal-title" id="deleteModelLongTitle">Delete menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-bold"> Are you sure want to delete this menu</p>
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
    form1.action='/menu/'+ id;
    $('#deleteModel').modal('show')
}
    </script>
@endsection