<table>
    <thead>
    <tr>
        <th>Site Name</th>
        <th>Site Features</th>
        <th>Site Features (JSON)</th>
    </tr>
    </thead>
    <tbody>
    @if($sites->isEmpty())
        <tr>
            <td colspan="2"><strong>You have no sites yet!</strong></td>
        </tr>
    @else
        @foreach($sites as $site)
            <tr>
                <td>{{ $site->name }}</td>
                <td>{{ $site->features }}</td>
                <td>{{ $site->getOriginal('features') }}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
