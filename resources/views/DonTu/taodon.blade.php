@extends('layouts/master')
@section('body')
<div class="row">
    <!--Thông tin chung-->
    <div class="col-md-5">
        <div class="card card-default color-palette-box">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-tag"></i>
                Thông tin chung
              </h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('maudon.Store')}}">
                  @csrf
                    <div class="form-group row">
                      <label for="tenmaudon" class="col-4 col-form-label">Tên trường</label>
                      <div class="col-12">
                        <input id="tenmaudon" name="tenmaudon" placeholder="Tên đơn" type="text" class="form-control" required="required">
                      </div>
                    </div> 
                    <div class="form-group row">
                        <label for="dieukhoan" class="col-4 col-form-label">Điều khoản</label> 
                        <div class="col-12">
                          <input id="dieukhoan" name="dieukhoan" placeholder="Điều khoản" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                        <input type="text" name="truong" id="truong" hidden="true">
                          <ol id="listTruongSelected">
                              
                          </ol>
                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-12 mx-auto">
                        <button type="submit" class="btn btn-block bg-gradient-primary">Tạo đơn mới</button>
                      </div>
                </div>
                  </form>
            </div>
          </div>
    </div>
    <!--Trường-->
    <div class="col-md-7">
        <div class="card card-default color-palette-box">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-tag"></i>
                Chọn trường
              </h3>
            </div>
            <div class="card-body">
              <form id="themtruongform">
                <div class="form-group row">
                    <label for="tenmaudon" class="col-4 col-form-label">Tên trường</label> 
                    <div class="col-10">
                        <input id="tentruong" name="tentruong" placeholder="Tên trường muốn thêm" type="text" class="form-control" required="required">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-block bg-gradient-primary">Thêm</button>
                      </div>
                </div>
                <div class="form-group row">
                  <label for="tenmaudon" class="col-4 col-form-label">Ghi chú</label> 
                  <div class="col-10">
                      <input id="ghichutruong" name="ghichutruong" placeholder="Ghi chú" type="text" class="form-control">
                  </div>
              </div>
                <ul id="listtruongContainer">
                    @foreach($listTruong as $item)
                        <li role="button" id="node{{$item->id}}" onClick="themTruong({{$item->id}}, '{{$item->tentruong}}')">{{$item->tentruong}}</li>
                    @endforeach
                </ul>
              </form>
            </div>
          </div>
    </div>
</div>
<script type="text/javascript">
    var listtruong = '';
    var truong = $('#truong');
    var listtruongContainer = $('#listtruongContainer');

    function themTruong(truongid, tentruong){
        listtruong = listtruong += truongid + ',';
        truong.val(listtruong);
        $('#node'+truongid).remove();
        // add node to selected list
        var linode = document.createElement('li');
        var node = document.createTextNode(tentruong);
        linode.appendChild(node);
        $('#listTruongSelected').append(linode);
    }
</script>
@endsection

@section('CustomScript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $("#themtruongform").submit(function(event) {
      var ajaxRequest;
      event.preventDefault();
      var values = $(this).serialize();
         ajaxRequest= $.ajax({
              url: "{{route('truong.Store')}}"+'?_token=' + '{{ csrf_token() }}',
              type: "post",
              data: values
          });
      ajaxRequest.done(function (response, textStatus, jqXHR){
        var rs = JSON.parse(response);
        var liNode = document.createElement('li');
        var textNode = document.createTextNode(rs.tentruong);
        liNode.setAttribute('role', 'button');
        liNode.setAttribute("id", "node"+rs.id);
        liNode.setAttribute("onClick", "themTruong("+rs.id+",'"+rs.tentruong+"')");
        $('#tentruong').val('');
        liNode.appendChild(textNode);
        $('#listtruongContainer').append(liNode);

      });
      ajaxRequest.fail(function (){
        
      });
    });
  });
</script>
@endsection