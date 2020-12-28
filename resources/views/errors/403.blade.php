@extends('frontend.layouts.app')

@section('title', '403 Authorization Denied')

@section('inline-style')
<style>
#app,
.valign-wrapper {
	height: calc(100% - 128px);
}
</style>
@endsection

@section('body', 'frontend 403')

@section('content')
    <div class="valign-wrapper center-align">
        <div class="container" id="403">
            <h1>403 - You are not authorized to access this page</h1>
        </div>
    </div>
@endsection
@section('inline-script')
<script>
</script>
@endsection