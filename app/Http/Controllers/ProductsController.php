<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;
use App\Product_reviews;

class ProductsController extends Controller
{
    // 本の追加処理
    public function add_done(Request $request){
        // バリデーション
        $validator = Validator::make($request->all(),[
            'pro_name' => 'required |min:1 |max:255',
            'pro_name_en' => 'required |min:1 |max:255',
            'pro_price' => 'required |min:1 |max:255',
            'pro_genre' => 'required |min:1 |max:255',
            'pro_author' => 'required |min:1 |max:255',
            'pro_author_en' => 'required |min:1 |max:255',
            'pro_original_author' => 'required |min:1 |max:255',
            'pro_original_author_en' => 'required |min:1 |max:255',
            'pro_release_date' => 'required |min:1 |max:255',
            'pro_publisher' => 'required |min:1 |max:255',
            'pro_label' => 'required |min:1 |max:255',
            'pro_description' => 'required |min:1 |max:10000',
            'pro_size' => 'required |min:1 |max:255',
            'pro_weight' => 'required |min:1 |max:255',
            'pro_stock' => 'required |min:1 |max:255',
            'pro_isbn' => 'required |min:1 |max:255',
        ]);
        
        // ファイルを取得
        $file = $request->file('pro_thumbnail1');
        // ファイルが空かどうか審査
        if(!empty($file)){
            // get file name
            $filename1 = $file->getClientOriginalName();
            $extension = pathinfo($filename1, PATHINFO_EXTENSION);//拡張子をゲットする。
            $filename1 = $filename1.date("YmdHis").md5(session_id()).".".$extension;
            // file move
            $file->move('./pro_img/',$filename1);
        }else{
            $filename1= '';
        }

        // ファイルを取得
        $file = $request->file('pro_thumbnail2');
        // ファイルが空かどうか審査
        if(!empty($file)){
            // get file name
            $filename2 = $file->getClientOriginalName();
            $extension = pathinfo($filename2, PATHINFO_EXTENSION);//拡張子をゲットする。
            $filename2 = $filename2.date("YmdHis").md5(session_id()).".".$extension;
            // file move
            $file->move('./pro_img/',$filename2);
        }else{
            $filename2= '';
        }

        // ファイルを取得
        $file = $request->file('pro_thumbnail3');
        // ファイルが空かどうか審査
        if(!empty($file)){
            // get file name
            $filename3 = $file->getClientOriginalName();
            $extension = pathinfo($filename3, PATHINFO_EXTENSION);//拡張子をゲットする。
            $filename3 = $filename3.date("YmdHis").md5(session_id()).".".$extension;
            // file move
            $file->move('./pro_img/',$filename3);
        }else{
            $filename3= '';
        }

        if ($validator->fails()){
            return redirect('/pro_add')
                ->withInput()
                ->withErrors($validator);
        }

        $products = new Product;
        $products->pro_name = $request->pro_name;
        $products->pro_name_en = $request->pro_name_en;
        $products->pro_price = $request->pro_price;
        $products->pro_thumbnail = $filename1;
        $products->pro_thumbnail2 = $filename2;
        $products->pro_thumbnail3 = $filename3;
        $products->pro_genre = $request->pro_genre;
        $products->pro_author = $request->pro_author;
        $products->pro_author_en = $request->pro_author_en;
        $products->pro_original_author = $request->pro_original_author;
        $products->pro_original_author_en = $request->pro_original_author_en;
        $products->pro_release_date = $request->pro_release_date;
        $products->pro_publisher = $request->pro_publisher;
        $products->pro_label = $request->pro_label;
        $products->pro_description = $request->pro_description;
        $products->pro_size = $request->pro_size;
        $products->pro_weight = $request->pro_weight;
        $products->pro_stock = $request->pro_stock;
        $products->pro_isbn = $request->pro_isbn;
        $products->save();
        return redirect('/');
    }

    public function top_view(){
        $products = Product::orderBy('created_at', 'asc')->get();
        return view('product/pro_list', ['products' => $products]);
    }

    public function add_view(){
        return view('product/pro_add');
    }

    public function delete_done(Product $product){
        $pro_thumbnail = $product->pro_thumbnail;
        if($pro_thumbnail != ''){
            unlink('./pro_img/'.$product->pro_thumbnail);
        }

        $product->delete();
        
        return redirect('/');

    }
    // 更新画面表示
    public function edit_view(Product $product){
        return view('product/pro_edit', ['product' => $product]);
    }

    // 更新処理
    public function edit_done(Request $request){
        // バリデーション
        $validator = Validator::make($request->all(),[
            'pro_name' => 'required |min:1 |max:255',
            'pro_name_en' => 'required |min:1 |max:255',
            'pro_price' => 'required |min:1 |max:255',
            'pro_genre' => 'required |min:1 |max:255',
            'pro_author' => 'required |min:1 |max:255',
            'pro_author_en' => 'required |min:1 |max:255',
            'pro_original_author' => 'required |min:1 |max:255',
            'pro_original_author_en' => 'required |min:1 |max:255',
            'pro_release_date' => 'required |min:1 |max:255',
            'pro_publisher' => 'required |min:1 |max:255',
            'pro_label' => 'required |min:1 |max:255',
            'pro_description' => 'required |min:1 |max:10000',
            'pro_size' => 'required |min:1 |max:255',
            'pro_weight' => 'required |min:1 |max:255',
            'pro_stock' => 'required |min:1 |max:255',
            'pro_isbn' => 'required |min:1 |max:255',
        ]);

        // ファイルを取得
        $file = $request->file('pro_thumbnail1');
        // ファイルが空かどうか審査
        if(!empty($file)){
            // get file name
            $filename1 = $file->getClientOriginalName();
            $extension = pathinfo($filename1, PATHINFO_EXTENSION);//拡張子をゲットする。
            $filename1 = $filename1.date("YmdHis").md5(session_id()).".".$extension;
            // file move
            $file->move('./pro_img/',$filename1);
        }else{
            $filename1= '';
        }

        // ファイルを取得
        $file = $request->file('pro_thumbnail2');
        // ファイルが空かどうか審査
        if(!empty($file)){
            // get file name
            $filename2 = $file->getClientOriginalName();
            $extension = pathinfo($filename2, PATHINFO_EXTENSION);//拡張子をゲットする。
            $filename2 = $filename2.date("YmdHis").md5(session_id()).".".$extension;
            
            // file move
            $file->move('./pro_img/',$filename2);
        }else{
            $filename2= '';
        }

        // ファイルを取得
        $file = $request->file('pro_thumbnail3');
        // ファイルが空かどうか審査
        if(!empty($file)){
            // get file name
            $filename3 = $file->getClientOriginalName();
            $extension = pathinfo($filename3, PATHINFO_EXTENSION);//拡張子をゲットする。
            $filename3 = $filename3.date("YmdHis").md5(session_id()).".".$extension;
            // file move
            $file->move('./pro_img/',$filename3);
        }else{
            $filename3= '';
        }

        if ($validator->fails()){
            return redirect('/pro_add')
                ->withInput()
                ->withErrors($validator);
        }

        $products = Product::find($request->id);
        $products->pro_name = $request->pro_name;
        $products->pro_name_en = $request->pro_name_en;
        $products->pro_price = $request->pro_price;
        $products->pro_thumbnail = $filename1;
        $products->pro_thumbnail2 = $filename2;
        $products->pro_thumbnail3 = $filename3;
        $products->pro_genre = $request->pro_genre;
        $products->pro_author = $request->pro_author;
        $products->pro_author_en = $request->pro_author_en;
        $products->pro_original_author = $request->pro_original_author;
        $products->pro_original_author_en = $request->pro_original_author_en;
        $products->pro_release_date = $request->pro_release_date;
        $products->pro_publisher = $request->pro_publisher;
        $products->pro_label = $request->pro_label;
        $products->pro_description = $request->pro_description;
        $products->pro_size = $request->pro_size;
        $products->pro_weight = $request->pro_weight;
        $products->pro_stock = $request->pro_stock;
        $products->pro_isbn = $request->pro_isbn;
        $products->save();
        return redirect('/');
    }
}
