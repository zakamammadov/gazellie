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

<form method="post" action="{{ route('admin.categories') }}" class="form-inline">
    {{ csrf_field() }}
    <div class="form-group">

        <label for="search">Search</label>
        &nbsp;
        <input type="text" class="form-control form-control-sm" name="search" id="search" placeholder=" Category name..." value="{{ old('search') }}">
    </div>&nbsp;&nbsp;

    &nbsp;

    <div class="form-group">

        <label for="top_id">Top Category</label>        &nbsp;
        <select name="top_id" id="top_id" class="form-control">
            <option value="">Select</option>
            @foreach($top_category as $top_cat)
                <option value="{{ $top_cat->id }}" {{ old('top_id') == $top_cat->id ? 'selected' : '' }}>{{ $top_cat->cat_name_en}}</option>
            @endforeach
        </select>
    </div>        &nbsp;
    <button type="submit" class="btn btn-danger">Search</button>&nbsp;
    <a href="{{ route('admin.categories') }}" class="btn btn-warning">Clear</a>

</form>







<div class="btn-group float-right">
    <a href="{{ route('back.category.create') }}" class="btn btn-primary">New</a>
</div>
<br>
<br>
<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
    <div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">
            <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button> <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true" aria-expanded="false"><span>Column visibility</span><span class="dt-down-arrow"></span></button></div> </div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                <thead>
                    <tr>
                      <th>№</th>
                      <th>Top Category</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Created date</th>
                      <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>

                        @if (count($list) == 0)
                        <tr><td colspan="6" class="text-center">Record not found!</td></tr>
                    @endif


                      @if (count($list)>0)
  @php
      $num=1;
  @endphp
                      @foreach ($list as $entry)


                    <tr>

                      <td>{{$num++;}}</td>
                      <td style="color:red;font-weight:bold">{{$entry->top_category->cat_name_en}}</td>
                      <td>{{$entry->cat_name_en}}</td>
                      <td>{{$entry->slug}}
                      </td>
                      <td>{{$entry->created_at}}
                      </td>
                      <td>
  <a href="{{route('back.category.edit',$entry->id)}}">
                          <i class="fa-regular fa-pen-to-square fa-beat fa-lg" style="color: #1f2251;"></i>
  </a>
  &nbsp;&nbsp;&nbsp;&nbsp;



                          <a href="{{ route('back.category.delete', $entry->id) }}" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Are you sure?')">


                              <i class="fa-solid fa-trash fa-beat fa-lg" style="color: #511f1f;"></i>


                          </a>


                      </td>

                    </tr>
                    @endforeach
  @else


  <tr>
      {{"Category not found"}}

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


