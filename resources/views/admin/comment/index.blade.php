@extends('admin.layouts.main')
@section('content')
<section class="content">
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <div class="row">
        <div class="col-6">
          <div>
            <a href="{{ route('request.admin.show') }}"><button class="btn btn-success">Все</button></a>
            <a href="{{ route('request.admin.show', parameters: '?type=Активна') }}"><button class="btn btn-success">Активные</button></a>
            <a href="{{ route('request.admin.show', '?type=Решена') }}"><button class="btn btn-success">Решенные</button></a>
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
