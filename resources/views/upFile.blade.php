<form action="{{route('uploadFile')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="myFile"/><br/>
    <input type="submit" value="Upload"/>
</form>