@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Page Not Found'))
@section('image',  asset('assets/images/illustrations/404_error.png'))
