@extends('layouts.app')
@section('content')

<style>
    #content > nav.flex.items-center.justify-between > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between > div:nth-child(2)
    {
        display: none;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>Add New Post</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())

        <div class="alert alert-danger">
            <strong>Sorry,</strong> Please fill all the blank.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- onsubmit="return onsubmitForm(this);" --}}
    <form action="{{ route('posts.store') }}" method="POST">
    	@csrf
         <div class="row">

		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Title:</strong>		            
                    <input type="text" name="title" id="title" class="form-control" placeholder="Title">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Title:</strong>		            
                <input type="text" name="meta_title"  id="meta_title" class="form-control" placeholder="Meta Title">
            </div>
        </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Body:</strong>
                    <textarea id="body" name="body" id="body" class="form-control" style="height:150px" placeholder="Body"></textarea>         
		        </div>
		    </div> 

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>

		</div>
    </form>
</div>
@endsection

{{-- <script>
    function onsubmitForm(form) {
        var ajax = new XMLHttpRequest();
        ajax.open("POST", form.getAttribute("action"), true);
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                alert(data.status + " - " + data.message);
            }
            if (this.status == 500) {
                alert(this.responseText);
            }
        };
        var formData = new FormData(form);
        ajax.send(formData);
        return false;
    }
</script> --}}