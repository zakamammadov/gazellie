@extends('backend.layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('back')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('back')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('back')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('back')}}/dist/css/adminlte.min.css">
<script src="https://kit.fontawesome.com/83bbd2eb7a.js" crossorigin="anonymous"></script>
@endsection

@section('title')
Users
@endsection


@section("content")


<table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>№</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>Created date</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>
                    @if (count($users)>0)

                    @foreach ($users as $user)


                  <tr>
                    <td>{{$user->user_id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}
                    </td>




                    <td>

                        @if ($user->is_admin)
                        <span class="badge bg-primary">{{'Adminstrator'}}</span>
                            @else

                                <span class="badge bg-warning">{{'Customer'}}</span>

                            @endif
                    </td>

                    <td>
                        @if ($user->is_active)
                        <span class="badge bg-primary">{{'Active'}}</span>

                            @else
                            <span class="badge bg-warning">{{'Passive'}}</span>

                            @endif
                    </td>


                    <td>{{$user->created_at}}
                    </td>
                    <td>
<a href="{{route()}}">
                        <i class="fa-regular fa-pen-to-square fa-beat fa-lg" style="color: #1f2251;"></i>
</a>
&nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="fa-solid fa-trash fa-beat fa-lg" style="color: #511f1f;"></i>

                    </td>

                  </tr>
                  @endforeach
@else


<tr>
    {{"User not found"}}

  </tr>





                  @endif

                  </tbody>

                </table>



@endsection


