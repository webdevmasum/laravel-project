@extends('layouts.app')
@section('page')

{!! Page::header(["title"=>"Edit Supplier"]) !!}
{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Edit Supplier"]) !!}
{!! Form::open_laravel(["route"=>"suppliers/$supplier->id","method"=>"PUT"]) !!}
{!! Form::text(["name"=>"name","label"=>"Name","value"=>"$supplier->name"]) !!}

<?php
//  echo Form::select(["name"=>"brand","label"=>"Brand","table"=>$brands]);
//  echo Form::select(["name"=>"category","label"=>"Category","value"=>"$supplier->supplier_category_id","table"=>$categories]);
 
 echo Form::text(["name"=>"mobile","label"=>"Mobile","value"=>"$supplier->mobile"]);
 echo Form::text(["name"=>"email","label"=>"Email","value"=>"$supplier->email"]);
 echo Form::text(["name"=>"address","label"=>"Address","value"=>"$supplier->address"]);


 echo "<div class='btn-group'>";
 echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]);
 echo Html::link(["route"=>url("suppliers"),"text"=>"Manage"]);
 echo "</div>";
 
 echo Form::close();

 echo Page::content_close();
 echo Page::body_close();

?>

@endsection