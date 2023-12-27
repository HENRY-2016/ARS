<x-app-layout>
<div class="container-fluid page-body-wrapper">
@include('layouts.navigation')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row" id="proBanner">
        <div class="col-12">
        <span class="d-flex align-items-center purchase-popup">
            <p class="text text-primary" style="font-size: 20px;">{{GeneralHelper::getTodaysDate()}}</p>
            <a class="btn ml-auto download-button"></a>
            <button type="button" class="btn btn-info btn-rounded btn-fw" data-bs-toggle="modal"  data-bs-target="#signInModal">Sign In</button>
            <!-- <i class="mdi mdi-close" id="bannerClose"></i> -->
        </span>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <center>
            <div class="alert alert-primary" style="width: 40% !important;" role="alert" >
                <p class="text-center"> {{Auth::User()->name}} {{$message}}</p>
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
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Signed In</th>
                                    <th class="text-center">Check Point</th>
                                    <th class="text-center">Sign Out</th>
                                    <th class="text-center">Action 1</th>
                                </tr>
                                </thead>
                                @foreach($data as $row)
                                    @if(Auth::User()->email == 'admin@gmail.com')
                                        <tr class="row{{$row->id}}">
                                            <td class="text-center">{{GeneralHelper::getUserName($row->name)}}</td>
                                            <td class="text-center">
                                                @if($row->status == 'Pending')
                                                    <label class="badge badge-danger">Pending</label>
                                                @endif
                                                @if($row->status == 'Approved')
                                                    <label class="badge badge-success">Approved</label>
                                                @endif
                                            </td>
                                            <td class="text-center">{{$row->signIn}}</td>
                                            <td class="text-center">{{GeneralHelper::getCheckPointName($row->checkPoint)}}</td>
                                            <td class="text-center">{{$row->signOut}}</td>

                                            <td class="text-center">
                                                @if($row->status == 'Pending')
                                                    <button type="button" class="btn btn-danger btn-rounded btn-fw" data-bs-toggle="modal" data-bs-id="{{ $row->id }}"  data-bs-target="#approveModal"
                                                    data-bs-name="{{GeneralHelper::getUserName($row->name)}}"
                                                >Approve</button>
                                                @endif
                                                @if($row->status == 'Approved')
                                                    <button type="button" class="btn btn-success btn-rounded btn-fw" 
                                                >Approved</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @else
                                        @if($row->name == Auth::User()->id)
                                        <tr class="row{{$row->id}}">
                                            <td class="text-center">{{GeneralHelper::getUserName($row->name)}}</td>
                                            <td class="text-center">
                                                @if($row->status == 'Pending')
                                                    <label class="badge badge-danger">Pending</label>
                                                @endif
                                                @if($row->status == 'Approved')
                                                    <label class="badge badge-success">Approved</label>
                                                @endif
                                            </td>
                                            <td class="text-center">{{$row->signIn}}</td>
                                            <td class="text-center">{{GeneralHelper::getCheckPointName($row->checkPoint)}}</td>
                                            <td class="text-center">{{$row->signOut}}</td>

                                            <td class="text-center" >
                                                
                                                @if(($row->signOut == 'Null')&& ($row->status == 'Approved'))
                                                <button type="button" class="btn btn-danger btn-rounded btn-fw" data-bs-toggle="modal"  data-bs-target="#signOutModal"
                                                >  Sign Out</button>
                                                @endif
                                                @if($row->signOut != 'Null')
                                                    <button type="button" class="btn btn-success  btn-fw" 
                                                >Already Signed Out</button>
                                                @endif
                                                @if(($row->status == 'Pending')&& ($row->checkPoint == 'Null'))
                                                <button type="button" class="btn btn-dark btn-rounded btn-fw" data-bs-toggle="modal"  data-bs-target="#signOutModal"
                                                > Approval Pending</button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                    @endif
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

    <!-- The sign In Modal -->
    <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-text-style">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="signInModalLabel">
                    {{trans_choice('general.signIn',2)}} To The
                    {{trans_choice('general.roster',1)}} 
                </h4>
            </div>
            
            <!-- Modal body -->
            <div class="delete-modal-body">
                <br><p class="modal-title text-center" >Are Sure You Want To Sign In</p><br>
                <center>
                    <p >{{Auth::User()->name}}</p>
                    <p>{{Auth::User()->email}}</p>
                    <p>{{GeneralHelper::getCurrentTime()}}</p>
                </center>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No Close</button>
                <form  action="{{route('RosterResource.store')}}" method="post">
                    {{ csrf_field() }}
                    <button  type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes {{trans_choice('general.signIn',1)}}</button>
                    <input type="hidden"  name="Name" value="{{Auth::User()->id}}" >
                    <input type="hidden" value="signIn" name="signIn">
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- The approve Modal -->
    <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-text-style">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="approveModalLabel">
                    {{trans_choice('general.approve',2)}}
                    {{trans_choice('general.staff',1)}} 
                </h4>
            </div>
            
            <!-- Modal body -->
            <div class="delete-modal-body">
                <br><p class="modal-title text-center" >Are Sure You Want To {{trans_choice('general.approve',1)}}</p><br>
                <center>
                    <p id="approve-name"></p>
                    <p id="approve-sign-in"></p>

                    <form  action="{{route('RosterResource.update','null')}}" method="post">
                        {{method_field('patch')}}
                        {{ csrf_field() }}
                        <p><b>Assign Check Point</b></p>
                        <div class="form-group" style="width: 50%;">
                            <select class="form-control form-control-lg" name="checkPoint" required>
                                <option> </option>
                                @foreach (App\Models\CheckPointsModel::get(['id']) as $name)
                                    <option value="{{$name->id}}" >{{GeneralHelper::getCheckPointName($name->id)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" id="approve-id" name="approveId"  >
                        <button  type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes {{trans_choice('general.approve',1)}} {{trans_choice('general.staff',1)}}</button>
                    </form>

                </center>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No Close</button>
                
            </div>
            </div>
        </div>
    </div>

    <!-- The sign Out Modal -->
    <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-text-style">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="signOutModalLabel">
                    {{trans_choice('general.signOut',2)}}
                </h4>
            </div>
            
            <!-- Modal body -->
            <div class="delete-modal-body">
                <br><p class="modal-title text-center" >Are Sure You Want To Sign Out</p><br>
                <center>
                    <p >{{Auth::User()->name}}</p>
                    <p>{{Auth::User()->email}}</p>
                    <p>{{GeneralHelper::getCurrentTime()}}</p>
                </center>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No Close</button>
                <form  action="{{route('RosterResource.store')}}" method="post">
                    {{ csrf_field() }}
                    <button  type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes {{trans_choice('general.signOut',1)}}</button>
                    <input type="hidden"  name="Name" value="{{Auth::User()->id}}" >
                    <input type="hidden"  name="signOut" value="signOut">
                    <input type="text"  name="rowId" value="5">

                </form>
            </div>
            </div>
        </div>
    </div>



</div>

<script>
$('#approveModal').on('show.bs.modal', function(event){
var target = jQuery(event.relatedTarget)
var id = target.attr('data-bs-id');
var name = target.attr('data-bs-name');
var RequestUrl = BaseUrl+"/RosterResource/"+id+"/edit";
$.get(RequestUrl, function (data) {
$('#approveModal').modal('show');
$('#approve-id').val(data.data.id);
$('#approve-name').html(name);
$('#approve-sign-in').html(data.signIn);
})
});
</script>
</x-app-layout>