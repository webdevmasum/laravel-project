
@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Sale"]);
echo Page::body_open();
echo Page::content_open(["button"=>"Sale","route"=>"sales"]);
?>

<?php

echo Table::get_array_table($sales,["id","date","customer","mobile","shipping_address","sale_total"],"sales");

?>

{{$sales->links("pagination::bootstrap-4")}}

<?php
echo Page::content_close();
echo Page::body_close();
?>

@endsection