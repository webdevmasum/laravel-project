@extends('layouts.app')
@section('page')

{!! Page::header(["title"=>"Edit Contact"]) !!}
{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Edit Contact"]) !!}
{!! Form::open_laravel(["route"=>"contacts/$contact->id","method"=>"PUT"]) !!}
{!! Form::text(["name"=>"name","label"=>"Name","value"=>"$contact->name"]) !!}

<?php
//  echo Form::select(["name"=>"brand","label"=>"Brand","table"=>$brands]);
//  echo Form::select(["name"=>"category","label"=>"Category","value"=>"$supplier->supplier_category_id","table"=>$categories]);
 
 echo Form::text(["name"=>"mobile","label"=>"Mobile","value"=>"$contact->mobile"]);
 echo Form::text(["name"=>"address","label"=>"Address","value"=>"$contact->address"]);


 echo "<div class='btn-group'>";
 echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]);
 echo Html::link(["route"=>url("contacts"),"text"=>"Manage"]);
 echo "</div>";
 
 echo Form::close();

 echo Page::content_close();
 echo Page::body_close();

?>

@endsection