<form method="POST" enctype="multipart/form-data" action="{{route('upload')}}">
    @csrf
    <input name="upload" type="file">
    <input type="submit">
</form>