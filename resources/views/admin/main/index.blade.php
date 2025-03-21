@extends('admin.layouts.main')
@section('content')
<section class="content">
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <div class="row">
        <div class="col-6">
          <div>
            <form action="{{ route('request.admin.show') }}" method="get">
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
        <table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Название</th>
      <th colspan="3" class="text-center">Действие</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($usersRequests as $request)
    <tr>
      <td>{{ $request->id}}</td>
      <td>{{ $request->message}}</td>
      <td><a href="#"><i class="far fa-eye"></a></td>
      <td><a href="#" class="text-success"><i class="fas fa-pencil-alt"></a></td>
      <td>
      </td>
      @endforeach
    </tr>
  </tbody>
</table>


</div>
</div> 
          </div>
          
      </div>
      </div>
    </section>
@endsection
