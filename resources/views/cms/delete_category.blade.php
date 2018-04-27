
@extends('cms.cms_master')

@section('cms_content')


<h3 class="page-header">האם למחוק קטגוריה זו?</h3>

<div class="row">
    <div class="col-md-6">

        <form action="{{url('cms/categories/' .$id)}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input type="submit" name="submit" value="למחוק" class="btn btn-danger">
            <a href="{{url('cms/categories')}}" class="btn btn-default">ביטול</a>
        </form>

    </div>
</div>


@endsection