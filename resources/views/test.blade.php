@if(isset($gg))
    <b>{{$gg}}</b>
@endif

@if(isset($list))
    @foreach($list as $k => $v)
        <b>{{$v->name}}</b><br />
    @endforeach
@endif

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>laravel学习</title>
<head>
    <style type="text/css">
    table.imagetable {
        font-family: verdana,arial,sans-serif;
        font-size:11px;
        color:#333333;
        border-width: 1px;
        border-color: #999999;
        border-collapse: collapse;
    }
    table.imagetable th {
        background:#b5cfd2 url('cell-blue.jpg');
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #999999;
    }
    table.imagetable td {
        background:#dcddc0 url('cell-grey.jpg');
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #999999;
    }
    </style>
</head>
<body>
<!-- Table goes in the document BODY -->
    <table class="imagetable">
    <tr>
        <th>名字</th><th>年龄</th><th>创建日期</th>
    </tr>
    @foreach($list as $val)
    <tr>
        <td>{{$val->name}}</td><td>{{$val->age}}</td><td>{{$val->createtime}}</td>
    </tr>
    @endforeach
    </table>
    {{$list->links()}}
</body>
</html>



