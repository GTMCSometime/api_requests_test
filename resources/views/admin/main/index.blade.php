@extends('admin.layouts.main')
@section('content')
<section class="content">
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <div class="row">
        <div class="col-6">
          <div>
        <table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Название</th>
      <th>Статус</th>
      <th>Дата</th>
      <th colspan="3" class="text-center">Действие</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($usersRequests as $request)
    <tr>
      <td>{{ $request->id}}</td>
      <td>{{ $request->message}}</td>
      <td>{{ $request->type}}</td>
      <td>{{ $request->created_at->format('H-m-d')}}</td>
      <td><a href="{{ route('requests.admin.edit', $request->id) }}" class="text-success">Ответить</a></td>
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
