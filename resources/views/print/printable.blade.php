@extends('basic')

@section('styles')
<link href="{{ asset('css/printable.css') }}" rel="stylesheet">
@stop

@section('content')
    <div>{{ $data->name }}</div>

    <table class="table table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Hanzi</th>
                <th>Pinyin</th>
                <th>Phrase</th>
            </tr>
        </thead>
        <tbody>
            @if(sizeof($data->practices))
                @foreach($data->practices as $k => $practice)
                    <tr>
                        <td>{{ $k + 1 }}</td>
                        <td>
                            <span class="hanzi">
                                {{ $hanzi ? $practice->hanzi : '' }}
                            </span>
                        </td>
                        <td>{{ $pinyin ? $practice->pinyin : '' }}</td>
                        <td>{{ $phrase ? $practice->phrase : '' }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@stop

<script>
window.print()
</script>