@extends('cms.cms_master')

@section('cms_content')
<h1 class="page-header">ההזמנות שבוצעו באתר</h1>


@if($orders)
<div class="row">
    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>שם לקוח</th>
                    <th>הזמנה</th>
                    <th>סה"כ</th>
                    <th>תאריך</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->name}}</td>
                    <td>
                        <ul>
                            @foreach(unserialize($order->data) as $item)
                            <li>
                                {{$item['name']}}, כמות: {{$item['quantity']}}, מחיר: {{$item['price']}}₪
                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{$order->total}}₪</td>
                    <td>{{$order->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection