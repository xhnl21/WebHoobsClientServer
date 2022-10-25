@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">WebHookList</div>
                <div class="card-body">
                    <?php
                        // dd($data);
                    ?>
                    <a class="btn btn-primary" href="{{ route('shows') }}">
                        Add
                    </a>
                    <br>
                    <br>
                    <table class="table table-striped table-dark table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) > 0)
                                @foreach ($data as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->type }}</td>
                                        <td>{{ $user->status }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th scope="row" colspan="5">
                                        <div style="text-align: center;">No Record</div>                                    
                                    </th>
                                </tr>                            
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection