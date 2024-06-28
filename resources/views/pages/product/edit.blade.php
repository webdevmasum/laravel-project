@extends('layouts.app')
@section('page')

{!! Page::header(["title"=>"Edit Product"]) !!}
{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Edit Product"]) !!}
{!! Form::open_laravel(["route"=>"products/$product->id","method"=>"PUT"]) !!}
{!! Form::text(["name"=>"name","label"=>"Name","value"=>"$product->name"]) !!}

<?php
//  echo Form::select(["name"=>"brand","label"=>"Brand","table"=>$brands]);
 echo Form::select(["name"=>"category","label"=>"Category","value"=>"$product->product_category_id","table"=>$categories]);
 
 echo Form::text(["name"=>"offer_price","label"=>"Offer Price","value"=>"$product->offer_price"]);
 echo Form::text(["name"=>"regular_price","label"=>"Regular Price","value"=>"$product->regular_price"]);
 echo Form::text(["name"=>"photo","type"=>"file","label"=>"Photo"]);

 echo "<div class='btn-group'>";
 echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]);
 echo Html::link(["route"=>url("products"),"text"=>"Manage"]);
 echo "</div>";
 
 echo Form::close();

 echo Page::content_close();
 echo Page::body_close();

?>

@endsection