@extends('admin.layouts.main')
@section('content')
<section class="content">
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <div class="row">
        <div class="col-6">
          <div>
          <form action="{{ route('request.admin.index') }}" method="get">
              @csrf
              <select class="form-select" aria-label="Default select example" name="type">
  <option value="0">Выберите</option>
  @foreach ($types as $type)
  <option value="{{ $type->value }}">{{ $type->value }}</option>
  @endforeach
</select>
            <button type="submit">Фильтр</button>

            </form>
          </div>
</div>
</div> 
          </div>
          
      </div>
      </div>
    </section>
@endsection
