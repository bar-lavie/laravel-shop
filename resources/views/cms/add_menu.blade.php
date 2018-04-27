
@extends('cms.cms_master')

@section('cms_content')


<h1 class="page-header">הוספת לינק לאתר</h1>

<div class="row">
    <div class="col-md-6">


        <form action="{{url('cms/menu')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="link">שם הקישור</label>
                <input name="link" type="text" value="{{old('link')}}" class="form-control origin-feild">
            </div>

            <div class="form-group">
                <label for="title">כותרת עמוד</label>
                <input name="title" type="text" value="{{old('title')}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="url">קישור</label>
                <input name="url" type="text" value="{{old('url')}}" class="form-control target-feild" placeholder="{{url('')}}/">
            </div>
            <input type="submit" name="submit" value="שמור" class="btn btn-primary">
            <a href="{{url('cms/menu')}}" class="btn btn-default">ביטול</a>
        </form>


    </div>
</div>


@endsection