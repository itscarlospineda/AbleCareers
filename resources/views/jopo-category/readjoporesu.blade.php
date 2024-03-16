@extends('layouts.admin')

@section('content')

<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Jopo-Resume</h2></div> 
                        <div class="card-body">
                            <div class="row mb-3">
                            <table class="table">
            <thead>
                <tr>
                    <th>RESUME ID</th>
                    <th>JOB POSITION ID</th>
                    <th>ACTIVE</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jopResume as $jopoResume)
                        <tr>
                        <td>{{ $jopoResume->resume_id }}</td>
                        <td>{{ $jopoResume->job_position_id }}</td>
                        <td>{{ $jopoResume->is_active }}</td>
                        <td>
                         
                        </tr>
                        @endforeach
                        </tbody>
                        </table>    
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection