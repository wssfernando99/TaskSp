@extends('layout')
@section('content')
<div class="container-fluid p-5">

    <div class="row">
        <div class="col-md-6">deliveryId</div>
        <div class="col-md-6">{{ $delivery->deliveryId }}</div>
    </div>

</div>
@endsection