@extends('backend.layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('back')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('back')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('back')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('back')}}/dist/css/adminlte.min.css">
@endsection

@section('title')
Users
@endsection


@section("content")


<table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                    @if (count($users)>0)
                        
                    @foreach ($users as $user)
                        

                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}
                    </td>
                    <td>{{$user->is_admin}}</td>
                    <td>

<button class=btn-warning>Edit</button>
<button class=btn-danger>Delete</button>

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


