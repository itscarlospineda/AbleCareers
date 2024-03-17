@extends('layouts.app')

@section('template_title')
    User Request
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User Request') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('user-request.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>User Id</th>
										<th>Request Info</th>
										<th>Request Status</th>
										<th>Is Active</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userRequests as $userRequest)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $userRequest->user_id }}</td>
											<td>{{ $userRequest->request_info }}</td>
											<td>{{ $userRequest->request_status }}</td>
											<td>{{ $userRequest->is_active }}</td>

                                            <td>
                                                <form action="{{ route('user-request.destroy',$userRequest->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('user-request.show',$userRequest->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('user-request.edit',$userRequest->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $userRequests->links() !!}
            </div>
        </div>
    </div>
@endsection
