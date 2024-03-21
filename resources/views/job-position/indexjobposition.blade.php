@extends('layouts.admin')

@section('template_title')
    Job Position
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Job Position') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('jobPosition.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
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

                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Post Date</th>
                                        <th>Company Id</th>
                                        <th>Is Active</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp {{-- Variable $i para mostrar el numero de fila --}}
                                    @foreach ($jobPosition as $jobPosition)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $jobPosition->name }}</td>
                                            <td>{{ $jobPosition->description }}</td>
                                            <td>{{ $jobPosition->post_date }}</td>
                                            <td>{{ $jobPosition->company_id }}</td>
                                            <td>{{ $jobPosition->is_active }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('jobPosition.update_or_destroy', $jobPosition->id) }}"
                                                    method="POST">
                                                    {{--  <a class="btn btn-sm btn-primary " href="{{ route('jobPosition.show',$jobPosition->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a> --}}
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('jobPosition.edit', $jobPosition->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('PUT')

                                                    <button type="submit" class="btn btn-danger btn-sm" name="action"
                                                        value="destroy"><i class="fa fa-fw fa-trash"></i>
                                                        {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{--  {!! $jobPosition->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
