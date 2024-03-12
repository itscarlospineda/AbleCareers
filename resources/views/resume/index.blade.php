@extends('layouts.app')

@section('template_title')
    Resume
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Resume') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('resumes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Info</th>
										<th>Education</th>
										<th>Work Experience</th>
										<th>Extra</th>
										<th>Reference</th>
										<th>Photo</th>
										<th>User Id</th>
										<th>Is Active</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resumes as $resume)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $resume->info }}</td>
											<td>{{ $resume->education }}</td>
											<td>{{ $resume->work_experience }}</td>
											<td>{{ $resume->extra }}</td>
											<td>{{ $resume->reference }}</td>
											<td>{{ $resume->photo }}</td>
											<td>{{ $resume->user_id }}</td>
											<td>{{ $resume->is_active }}</td>

                                            <td>
                                                <form action="{{ route('resumes.destroy',$resume->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('resumes.show',$resume->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('resumes.edit',$resume->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $resumes->links() !!}
            </div>
        </div>
    </div>
@endsection
