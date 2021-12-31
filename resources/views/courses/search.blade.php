<form method="get" action="/course" id="searchForm">
    <div class="row">
        <div class="col-sm-6 mb-2">
            <input type="text" class="form-control" name="course" id="course"
                   value="{{request()->course}}"
                   placeholder="Filter Course Name Or Description">
        </div>
        <div class="col-sm-4 mb-2">
            <select class="form-control" name="programme_id" id="programme_id">
                <option value="%">All Programmes</option>
                @foreach($programmes as $programme)
                    <option value="{{$programme->id}}"
                        {{(request()->programme_id == $programme->id ? 'selected' : '' ) }}>{{($programme->name)}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-2 mb-2">
            <button type="submit" class="btn btn-success btn-block">Search</button>
        </div>
    </div>
</form>
<hr>
@if($courses->count()==0)
    <div class="alert alert-danger alert-dismissible fade show">
        Can't find any courses with <b>'{{ request()->course }}'</b>
        @if ( request()->programme_id != "%" )
            in the programme <b>'{{$programmes[request()->programme_id-1]->name}}'</b>.
        @endif
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif