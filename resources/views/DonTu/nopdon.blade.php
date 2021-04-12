@extends('layouts/master')
@section('body')


<div class="col-md-12">
    <div class="card card-default color-palette-box">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-tag"></i>
            Nhập thông tin
          </h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('nopdon.Store', ['donid' => $maudon_id])}}">
              @csrf
                <div class="form-group row">
                  @foreach ($truong as $item)
                    <div class="col-md-4 mb-2">
                        <label for="tenmaudon" class="col-12 col-form-label">{{$item->tentruong}}</label>
                        <input id="tenmaudon" name="tentruong[{{$item->id}}]" placeholder="" type="text" class="form-control" required="required">
                      </div>
                  @endforeach
                </div> 
                <div class="form-group row">
                <div class="col-12 mx-auto">
                    <button type="submit" class="btn btn-block bg-gradient-primary">Nộp</button>
                  </div>
            </div>
              </form>
        </div>
      </div>
</div>
@endsection

@section('CustomScript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
@endsection