@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('h1', 'Ops, Something hapenning!')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
