@extends('layouts.site')

@section('header')
    @include('site.header')
@endsection

@section('content')
<div class="content">
			<div class="container">
				<div class="row">
    @include('detals.truck')
@endsection

@section('side_bar')
    @include('site.side_bar2')
    </div>
    </div>
    </div>
@endsection

@section('footer')
    @include('site.footer')
@endsection