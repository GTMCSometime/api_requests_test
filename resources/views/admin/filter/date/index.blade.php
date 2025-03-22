@extends('admin.layouts.main')
@section('content')
<section class="content">
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <div class="row">
        <div class="col-6">
        <form action="{{ route('request.admin.index') }}" method="get">
          @csrf
        <label for="created_at" class="form-label">Дата</label>
        <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Дату в формате: ГГГГ-ММ-ДД" value="{{ old('date') }}">
        <button type="submit">Фильтр</button>
        </form>
</div>
</div> 
          </div>
          
      </div>
      </div>
    </section>
@endsection