@extends('admin.layouts.main')
@section('content')
<section class="content">
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Оформление заявки</h1>
          </div>
        </div>
            <form action="{{ route('request.admin.store', $request->id) }}" method="post" class="w-25">
              @csrf
              @method('patch')
  <div class="mb-3">
  <h1>Имя пользователя {{ $request->name }}</h1>
  </div>
  <div class="mb-3">
  <h1>Заявка {{ $request->message }}</h1>
  </div>
  <div>
  <label for="comment" class="form-label">Дата</label>
  <input type="text" class="form-control" name="comment" id="comment" placeholder="Ответ на заявку" value="{{ old('comment') }}">
  @error('comment')
<div class="text-danger">{{ $message }}</div>
  @enderror
</div>
  <button type="submit" class="btn btn-primary" value="Отправить">Отправить</button>
</form>
            </div>
    </section>
@endsection
