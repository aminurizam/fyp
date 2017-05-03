@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Profile info -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h3>Product Status Information</h3>
                </div>

                <div class="panel-body">
                    @foreach($status as $stat)
                        <p><img src="{{ $stat->image }}" alt="" style="max-height: 150px"> {{ $stat->name }} {{ $stat->statusItem }}</p>
                        {{--<p>{{ $stat->statusItem }}</p>--}}
                    @endforeach
                </div>
            </div>
            <!-- /profile info -->
        </div>
    </div>
@endsection