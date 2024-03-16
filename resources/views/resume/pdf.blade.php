
<table id="resumes-table" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Información</th>
            <th>Educación</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($resumes as $resume)
        <tr>
            <td>{{ $resume->info }}</td>
            <td>{{ $resume->education }}</td>
            <td><img src="{{ asset("/$resume->photo") }}"  style="max-width: 100px; max-height: 100px;">
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
