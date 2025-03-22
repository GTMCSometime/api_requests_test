@extends('admin.layouts.main')
@section('content')
<section class="content">
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <div class="row">
        <div class="col-6">
        <ul>
                   <li>
                        <a href="{{ route('filter.status.index') }}">По статусу заявки
                        </a>
                        </li>
                        <li>
                        <a href="{{ route('filter.date.index') }}">По дате
                        </a>
                        </li>
                    </ul>
</div>
</div> 
          </div>
          
      </div>
      </div>
    </section>
@endsection
