@extends('layouts.common')

@section('content')

<div class="panel-body">
  <!-- バリデーションエラーの表示に使用 -->
  @include('common.errors')
  <!-- バリデーションエラーの表示に使用 -->

  <!-- 本登録フォーム -->
  <form action="{{url('pro_add_done')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <table border="1">
      <tr>
        <td>商品名</td>
        <td><input type="text" name="pro_name"></td>
      </tr>
      <tr>
        <td>商品名（英語表記）</td>
        <td><input type="text" name="pro_name_en"></td>
      </tr>
      <tr>
        <td>価格（円）</td>
        <td><input type="text" name="pro_price"></td>
      </tr>
      <tr>
        <td>画像1</td>
        <td><input type="file" name="pro_thumbnail1"></td>
      </tr>
      <tr>
        <td>画像2</td>
        <td><input type="file" name="pro_thumbnail2"></td>
      </tr>
      <tr>
        <td>画像3</td>
        <td><input type="file" name="pro_thumbnail3"></td>
      </tr>
      <tr>
        <td>ジャンル</td>
        <td>
          <select name="pro_genre" id="">
            <option value="Tokyo">Tokyo</option>
            <option value="Kyoto">Kyoto</option>
            <option value="Art">Art</option>
            <option value="Fashion">Fashion</option>
            <option value="Music">Music</option>
            <option value="Temple">Temple</option>
            <option value="Gokudo">Gokudo</option>
            <option value="Other">Other</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>著者</td>
        <td><input type="text" name="pro_author"></td>
      </tr>
      <tr>
        <td>著者(en)</td>
        <td><input type="text" name="pro_author_en"></td>
      </tr>
      <tr>
        <td>原作者</td>
        <td><input type="text" name="pro_original_author"></td>
      </tr>
      <tr>
        <td>原作者(en)</td>
        <td><input type="text" name="pro_original_author_en"></td>
      </tr>
      <tr>
        <td>発売日</td>
        <td><input type="date" name="pro_release_date"></td>
      </tr>
      <tr>
        <td>出版社</td>
        <td><input type="text" name="pro_publisher"></td>
      </tr>
      <tr>
        <td>レーベル</td>
        <td><input type="text" name="pro_label"></td>
      </tr>
      <tr>
        <td>作品詳細</td>
        <td><textarea name="pro_description" id="" cols="30" rows="10"></textarea></td>
      </tr>
      <tr>
        <td>書籍サイズ</td>
        <td><input type="text" name="pro_size"></td>
      </tr>
      <tr>
        <td>書籍重量</td>
        <td><input type="text" name="pro_weight"></td>
      </tr>
      <tr>
        <td>在庫数</td>
        <td><input type="text" name="pro_stock"></td>
      </tr>
      <tr>
        <td>ISBN_NO</td>
        <td><input type="text" name="pro_isbn"></td>
      </tr>
    </table>
    <!-- 本登録ボタン -->
    <button type="submit" class="btn-default">
      <i class="glyphicon glyphicon-plus"></i>SAVE
    </button>
  </form>
</div>

@endsection