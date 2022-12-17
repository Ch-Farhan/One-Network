@extends('layouts.master')
@section('css')

@endsection
<style>
    .btn-primary:hover {
        color: #fff !important;
        background-color: #1E6C93;
        border-color: #ffffff !important;
        box-shadow: #1E6C93;
    }
    .overme {
        width: 250px;
        overflow:hidden;
        white-space:nowrap;
        text-overflow: ellipsis;
        padding: 10px;
    }
td.overme {
    position: absolute;

}

.overme1 {
        width: 185px;
        overflow:hidden;
        white-space:nowrap;
        text-overflow: ellipsis;
        padding: 5px;
    }

tr,td,table{
    border-top: 1px solid #ebecf1;
    border-bottom: 1px solid #ebecf1;
}

/* ::before{
    background:transparent;
} */
</style>
@section('page-header')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">


        </div>

    </div>
    <!--End Page header-->
@endsection
@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-12">

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title"> <h4>List of Users</h4>
                    <input id="myInput" type="text" placeholder="Search.." class="float-left" style="position:relative; width: 200px; height:20px; border-radius:3px; border-color:#D3D3D3; margin-top:1.5px; margin-right:5px; outline-color:#D3D3D3">
                    <button class="text-gray" id="search-clear" style="position:relative; width: 60px; line-height:7px; height:20px; border-radius:3px; border-color:transparent; margin-top:1.5px; margin-right:5px; outline-color:#705ec8;">Reset</button>

                    </div>

                    <div class="pull-right ml-auto">
                        <!-- List Search -->
                        <br>
                        Pagination:&nbsp;<select style="position:relative; width: 200px; height:25px; border-radius:3px; border-color:#D3D3D3; margin-top:1.5px; margin-right:5px; outline-color:#705ec8;">
                            <option>vuetable-pagination</option>
                        </select>
                        <!-- <input id="myInput" type="text" placeholder="Search.." style="position:relative; width: 200px; height:25px; border-radius:3px; border-color:#705ec8; margin-top:1.5px; margin-right:5px; outline-color:#705ec8;"> -->
                        <a href="{{url('admin/add-project')}}"  class="btn float-right text-black" style="background-color:#D3D3D3; border:transparent;"><i class="fa fa-gear"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="">
                        <div class="table-responsive" style="background-color:transparent; border-top:2px">
                            <table id="example-1" class="table table-bordered text-nowrap key-buttons">
                                <thead>
                                <tr>
                                    <th style="border-top-left-radius: 5px;">Name</th>
                                    {{--
                                                                        <th class="border-bottom-0">DOB</th>
                                    --}}
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th class="overme">Notes</th>
                                    <th>Material</th>
                                    <!-- <td>Download</td> -->
                                    <th class="overme1">Gender</th>
                                    <th style="border-top-right-radius: 5px;">Action</th>
                                </tr>
                                </thead>
                                <!-- List Search -->
                                <tbody id="myTable">
                                @forelse($projects as $project)
                                    <tr>
                                        <td>
                                        <a href="{{url('admin/view-project', $project->id)}}" title="View Member" data-toggle="tooltip">{{$project->name}}</a>
                                            </td>
                                        <td>{{$project->start_date}}</td>
                                        <td>{{$project->end_date}}</td>
                                        <td class="overme" style="border-top: 1px solid white; border-left: 1px solid white; border-bottom: 1px solid white; ">{{$project->notes}}</td>
                                        <td>
                                            <img src="{{ ($project->material ?? '') ? url('/image/project/'.$project->material) : ''}}" style="height:40px; width:60px">
                                        </td>
                                        <!-- <td>
                                        <a href="/download/{{$project->material}}" title="Download image " download="{{$project->material}}">
                                            <img src="{{ ($project->material ?? '') ? url('/image/project/'.$project->material) : ''}}" style="height:40px; width:60px">
                                        </a>
                                        </td> -->
                                        <!-- <td>
                                            <div class="col-sm">
    <a href="file-upload/download/{{$project->material}}" download="{{$project->material}}">
        <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download">download</i></button>
        </a>
</div>
                                        </td> -->


                                       <td class="overme1">
                                           <form action="{{ url('/admin/change-project-status') }}" method="post" class="needs-validation" enctype="multipart/form-data">
                                               @csrf
                                               <!-- <input type="hidden" value="{{$project->id}}" name="id"> -->
                                               <!-- <div class="input-group mb-4"> -->
                                               @if($project->status =='1')
                                                <div class="label label-success text-white p-1" style="border-radius:3px;"><i class="fa fa-male mr-1"></i>Male</div>
                                                @else($project->status == '2')
                                                    <div class="label label-danger text-white p-1" style="border-radius:3px;"><i class="fa fa-female"></i>&nbsp;Female</div>
                                                @endif
                                                    <!-- <div v-if="$project.status == '1'"class="label label-warning">Approved</div>
                                                    <div v-else-if="$project.status == '2'"class="label label-success">Pending</div>
                                                    <div
                                                      v-else-if="$project.status == '3'"class="label label-danger">Cancelled</div> -->
                                                   <!-- <select name="status" id="status" class="form-control" onchange="random_function()">
                                                       <option id="{{$project->id}}" {{ ($project->status) == 1 ? 'selected' : '' }} value="1 ">Approve</option>
                                                       <option id="{{$project->id}}" {{ ($project->status) == 2 ? 'selected' : '' }} value="2 ">Pending</option>
                                                       <option id="{{$project->id}}" {{ ($project->status) == 3 ? 'selected' : '' }} value="3 ">Cancelled</option>
                                                   </select> -->
                                                   <!-- <span class="input-group-append"> -->
                                    <!-- <button class="btn btn-primary" type="submit" control-id="ControlID-70" style="position:relative; width:58px;"><span style="position:relative; left:-12px;">Update</span></button> -->
                                <!-- </span> -->
                                               <!-- </div> -->
                                           </form>
                                        </td>
                                        <td>
                                            <button value="{{$project->id}}"
                                                    class="delete-designation btn btn-danger" title="Delete">
                                                <i class="fa fa-close"></i></button>

                                            <!-- <a href="{{url('admin/view-project', $project->id)}}"  class="btn btn-gray-dark" title="View Member" data-toggle="tooltip"><i class="fa fa-eye"></i></a> -->

                                            <a href="{{url('admin/edit-project', $project->id)}}"  class="btn text-white" style="background-color:#d88010; border:transparent;" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                                            <a href="{{url('admin/project-manager', $project->id)}}"  class="btn btn-success" title="Add" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                            {!! $projects->links() !!}

                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->


            <div class="modal fade" id="deleteCategory" data-backdrop="static" tabindex="-1" role="dialog"
                 aria-labelledby="deleteCategory" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">This action is not reversible.</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete <span id="modal-category_name"></span>?
                            <input type="hidden" id="category" name="category_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-white" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" id="modal-confirm_delete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->



    </div>
    </div><!-- end app-content-->
    </div>
@endsection
@section('js')

@endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
// List Search
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
// Reset Button
$(document).ready(function() {
    console.log("ready");
     $("#search-clear").click(function(){
        $("#myInput").val("");
        console.log('button clicked')
     });
  });

    function loadDeleteModal(id, name) {
        $('#modal-category_name').html(name);
        $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
        $('#deleteCategory').modal('show');
    }


    $(document).ready(function() {
        //delet
        $(document).on('click', '.delete-designation', function (e) {
            e.preventDefault();
            var id = $(this).val();

            swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                },
                function() {
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '/admin/delete-project/'+id,
                        success: function (data) {
                            swal({
                                    title: "Project Deleted",
                                    type: "success",
                                    confirmButtonText: "OK",
                                    showCancelButton: false,
                                },
                                function(){
                                    location.reload();
                                }
                            );


                        }
                    });
                });
        });
    });
</script>
