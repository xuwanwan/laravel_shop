@extends('layout')

@section('title') {{$header_array['title']}} @parent @stop

@section('description') {{$header_array['description']}}  @stop

@section('keywords') {{$header_array['keywords']}} @stop

@section('beforeStyle')
@parent @stop
@section('style')
{{ HTML::style('css/templatemo_style.css') }}
{{ HTML::style('css/nivo-slider.css') }}
{{ HTML::style('css/ddsmoothmenu.css') }}
{{ HTML::script('js/jquery.min.js') }}
@parent @stop