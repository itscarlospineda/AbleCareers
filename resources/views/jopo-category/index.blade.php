@extends('layouts.app')

@section('template_title')
    Jopo Category
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Jopo Category') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('jopo-categories.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Category Id</th>
                                        <th>Job Position Id</th>
                                        <th>Is Active</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jopoCategories as $jopoCategory)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $jopoCategory->category_id }}</td>
                                            <td>{{ $jopoCategory->job_position_id }}</td>
                                            <td>{{ $jopoCategory->is_active }}</td>

                                            <td>
                                                <form action="{{ route('jopo-categories.destroy', $jopoCategory->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('jopo-categories.show', $jopoCategory->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('jopo-categories.edit', $jopoCategory->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $jopoCategories->links() !!}
            </div>
        </div>
    </div>
@endsection
