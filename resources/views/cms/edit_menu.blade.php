
@extends('cms.cms_master')

@section('cms_content')


<h1 class="page-header">עריכת לינק לאתר</h1>

<div class="row">
    <div class="col-md-6">


        <form action="{{url('cms/menu/' . $menu['id'])}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <input type="hidden" name="item_id" value="{{$menu['id']}}">
            <div class="form-group">
                <label for="link">שם הקישור</label>
                <input name="link" type="text" value="{{$menu['link']}}" class="form-control origin-feild">
            </div>

            <div class="form-group">
                <label for="title">כותרת עמוד</label>
                <input name="title" type="text" value="{{$menu['title']}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="url">קישור</label>
                <input name="url" type="text" value="{{$menu['url']}}" class="form-control target-feild" placeholder="{{url('')}}/">
            </div>

            <input type="submit" name="submit" value="עדכן" class="btn btn-primary">
            <a href="{{url('cms/menu')}}" class="btn btn-default">ביטול</a>
        </form>


    </div>
</div>


@endsection