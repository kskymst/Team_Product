@extends('layouts.common')

@section('content')
<!-- 本の一覧表示 -->
@if (count($products)>0)
<div class="panel panel-default">
  <div class="panel-heading">
    登録済み本一覧
  </div>
  <div class="panel-body">
    <table class="table table-striped task-table">
      <thead>
        <th>イメージ</th>
        <th>タイトル</th>
        <th>価格</th>
        <th>ジャンル</th>
        <th>詳細</th>
        <th>更新</th>
        <th>削除</th>

      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td class="table-text"><img src="./pro_img/{{$product->pro_thumbnail}}" style="width: 50px"></td>
            <td class="table-text">{{$product->pro_name}}</td>
            <td class="table-text">{{$product->pro_price}}</td>
            <td class="table-text">{{$product->pro_genre}}</td>
            <td class="table-text">{!!nl2br($product->pro_description)!!}</td>
            <!-- 更新ボタン -->
            <td>
              <form action="{{url('pro_edit/'.$product->id)}}" method="post">
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">
                  <i class="glyphicon glyphicon-pencil"></i>更新
                </button>
              </form>
            </td>
            <!-- 削除ボタン -->
            <td>
              <form action="{{url('pro_delete_done/'.$product->id)}}" method="post">
                {{csrf_field()}}
                <button type="submit" class="btn btn-danger">
                  <i class="glyphicon glyphicon-trash"></i>削除
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif


@endsection