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
<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
    <div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">
            <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button> <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true" aria-expanded="false"><span>Column visibility</span><span class="dt-down-arrow"></span></button></div> </div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
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
                        @if (count($users) == 0)
                        <tr><td colspan="7" class="text-center">User not found!</td></tr>
                    @endif
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

  </table></div></div><div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
    </div><div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
            <ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous">
                <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>



@endsection


