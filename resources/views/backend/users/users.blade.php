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
@include('frontend.layouts.partials.alert')

<form method="post" action="{{ route('admin.users') }}" class="form-inline">
    {{ csrf_field() }}
    <div class="form-group">
        {{-- <label for="search">Search</label> --}}
        <input type="text" class="form-control form-control-sm" name="search" id="search" placeholder=" Name, Email Search..." value="{{ old('search') }}">
    </div>&nbsp;&nbsp;
    <button type="submit" class="btn btn-danger">Search</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ route('admin.users') }}" class="btn btn-warning">Clear</a>
</form>


<div class="btn-group float-right">
    <a href="{{ route('back.user.create') }}" class="btn btn-primary">New</a>
</div>
<br>
<br>
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
@php
    $say=1;
@endphp
                    @foreach ($users as $user)


                  <tr>

                    <td>{{$say++;}}</td>
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
<a href="{{route('back.user.edit',$user->id)}}">
                        <i class="fa-regular fa-pen-to-square fa-beat fa-lg" style="color: #1f2251;"></i>
</a>
&nbsp;&nbsp;&nbsp;&nbsp;



                        <a href="{{ route('back.user.delete', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Are you sure?')">


                            <i class="fa-solid fa-trash fa-beat fa-lg" style="color: #511f1f;"></i>


                        </a>


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


