@extends('cms.cms_master')

@section('cms_content')
<h1 class="page-header">שינוי התפריטים באתר</h1>

<div class="row">
    <div class="col-md-12">
        <p><a class="btn btn-primary" href="{{url('cms/menu/create')}}">הוספת לינק באתר</a></p>
    </div>
</div>
<br>
<br>
@if($menu)
<div class="row">
    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>קישור</th>
                    <th>התעדכן לאחרונה</th>
                    <th>שינוי</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menu as $item)
                <tr>
                    <td>{{$item['link']}}</td>
                    <td>{{$item['updated_at']}}</td>
                    <td>
                        <a href="{{url('cms/menu/' . $item['id'] . '/edit')}}">עריכה</a> |
                        <a href="{{url('cms/menu/' . $item['id'])}}">מחיקה</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection