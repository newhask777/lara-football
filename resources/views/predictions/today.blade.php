@extends('layouts.base')

@section('content')
    <main class="ml-20 mr-20">
        <div class="content grid grid-cols-12 grid-flow-col gap-1 flex flex-row items-start p-2">

        <!-- Left Sidebar -->
        @include('predictions.left_sidebar')
        <!-- end Left Sidebar -->

        <!-- Main -->
        @include('predictions.content')
        <!-- End Main -->

        <!-- Right Sidebar -->
        @include('predictions.right_sidebar')
        <!-- End Right Sidebar -->

        </div>

    </main>

@endsection
