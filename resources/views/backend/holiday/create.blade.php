@extends('backend.layouts.app', ['module' => 'Holidays', 'title' => 'New Holiday'])
@section('content')
<form class="form-horizontal" method="POST" action="{{route('holidays.list.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="mb-2 col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa-light fa-save"></i>&nbsp;Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-danger float-end"><i class="fa-light fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <div class="mb-3 col-md-6">
            <label for="holiday_name" class="form-label">Holiday name</label>
            <input type="text" class="form-control form-control-sm" id="holiday_name" name="holiday_name">
        </div>
        <div class="mb-3 col-md-6">
            <label for="holiday_date" class="form-label">Holiday date</label>
            <input type="date" class="form-control form-control-sm" id="holiday_date" name="holiday_date">
        </div>
        <div class="mb-3 col-md-6">
            <label for="holiday_type" class="form-label">Holiday date</label>
            <select class="form-control form-control-sm" id="holiday_type" name="holiday_type">
                <option value="0">Normal</option>
                <option value="1">Restricted</option>
            </select>
        </div>
        <div class="mb-3 col-md-12 text-center">
           <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fa-light fa-save"></i>&nbsp;Save</button>
        </div>
    </div>
</form>
@endsection
