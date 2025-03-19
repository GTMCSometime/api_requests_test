<div class="container-fluid">
        <div class="row">
          <div class="col-12">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Оформление заявки</h1>
          </div>
        </div>
            <form action="{{ route('request.store') }}" method="post" class="w-25">
              @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Имя</label>
    <input type="text" class="form-control" name="name" placeholder="Введите имя" value="{{ old('name') }}">
    @error('name')
<div class="text-danger">{{ $message }}</div>
  @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Почта</label>
    <input type="text" class="form-control" name="email" placeholder="Ваша почта" value="{{ old('email') }}">
    @error('email')
<div class="text-danger">{{ $message }}</div>
  @enderror
  </div>
               <h2 class="section-title mb-5">Сообщение</h2>
                         <div class="row">
                                <div class="form-group col-12">
                                <textarea name="message" id="message" class="form-control" placeholder="Комментарий" rows="10"></textarea>
                                @error('message')
<div class="text-danger">{{ $message }}</div>
  @enderror
                              </div>
                            </div>

  <button type="submit" class="btn btn-primary" value="Добавить">Добавить</button>
</form>
            </div>
        </div>
        </div>