<x-app-layout>
<div class="container-fluid page-body-wrapper">
    @include('layouts.navigation')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row" id="proBanner">
                <div class="col-12">
                <button type="button" class="btn btn-primary btn-rounded btn-fw" data-bs-toggle="modal" data-bs-target="#addModal">Add Check Point</button>
                </div>
            </div>
            <br>
            @if ($message = Session::get('success'))
                <center>
                    <div class="alert alert-primary" style="width: 40% !important;" role="alert" >
                        <p class="text-center">{{$message}}</p>
                    </div>
                </center>
            @endif
                
            @if ($errors -> any())
                <center>
                    <div  class="alert alert-danger" style="width: 40% !important;" role="alert">
                        <ul>
                        @foreach($errors -> all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                <center>
            @endif
            <br>

            <div class="row">
                <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <table id="table" class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">Created</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Action 1</th>
                                    <th class="text-center">Action 2</th>
                                </tr>
                                </thead>
                                @foreach($data as $row)
                                <tr class="row{{$row->id}}">
                                    <td class="text-center">{{$row->created_at}}</td>
                                    <td class="text-center">{{$row->name}}</td>
                                    <td class="text-center" >
                                        <button type="button" class="btn btn-success btn-rounded btn-fw" data-bs-toggle="modal" data-bs-id="{{ $row->id }}" data-bs-target="#editModal"
                                        >  Edit</button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-rounded btn-fw" data-bs-toggle="modal" data-bs-id="{{ $row->id }}" data-bs-target="#deleteModal"
                                        data-bs-name="{{$row->name}}"
                                        >Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>

    <!-- The add Modal -->
    <div class="modal fade modal-lg" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-text-style">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-center" >
                        {{trans_choice('general.add',2)}} 
                        {{trans_choice('general.checkpoint',1)}} 
                    </h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form  action="{{route('CheckPointsResource.store')}}" method="post">
                        
                        {{ csrf_field() }}
                        @include('templates.checkpoints-add')
                        
                    </form>
                </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>


    <!-- The edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-text-style">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editModalLabel">
                    {{trans_choice('general.edit',2)}} 
                    {{trans_choice('general.checkpoint',1)}}
                </h4>
            </div>
            
            <!-- Modal body -->
            <div class="delete-modal-body">
            <form  action="{{route('CheckPointsResource.update','null')}}" method="post">
                    {{method_field('patch')}}
                    {{ csrf_field() }}
                    @include('templates.checkpoints-edit')
                    <input type="hidden"  id="editId" name="editId" >
                </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No Close</button>
            </div>
            </div>
        </div>
    </div>

    <!-- The delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-text-style">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteModalLabel">
                    {{trans_choice('general.delete',2)}} 
                    {{trans_choice('general.checkpoint',1)}} 
                </h4>
            </div>
            
            <!-- Modal body -->
            <div class="delete-modal-body">
                <br><p class="modal-title text-center" >Are Sure You Want To Delete</p><br>
                <p id="Delete-Name" class="text-center" ></p><br>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No Close</button>
                <form  action="{{route('CheckPointsResource.destroy','null')}}" method="post">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                    <button  type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes Delete</button>
                    <input type="hidden"  id="deleteId" name="deleteId" >
                </form>
            </div>
            </div>
        </div>
    </div>


</div>

<script>

$('#editModal').on('show.bs.modal', function(event){
var target = jQuery(event.relatedTarget)
var id = target.attr('data-bs-id');
var RequestUrl = BaseUrl+"/CheckPointsResource/"+id+"/edit";
console.log("========"+RequestUrl)
$.get(RequestUrl, function (data) {
    $('#editModal').modal('show');
    $('#editId').val(data.data.id);
    $('#name-edit').val(data.data.name);
})
});

$('#deleteModal').on('show.bs.modal', function(event){
    var target = jQuery(event.relatedTarget)
    var id = target.attr('data-bs-id');
    var name = target.attr('data-bs-name');

    var RequestUrl = BaseUrl+"/CheckPointsResource/"+id+"/edit";
    $.get(RequestUrl, function (data) {
        $('#deleteModal').modal('show');
        $('#deleteId').val(data.data.id);
        $('#Delete-Name').html(name);
    })
});

</script>
</x-app-layout>