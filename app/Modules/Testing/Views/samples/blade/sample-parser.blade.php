<!-- Extends Layout blade, set layout as main template -->
<?php /*@extends('layout.blade.php') */ ?>
<!-- Data for section content -->
@section('content')

    <!-- Logical -->
    @if (1 == 1)
        <p>1 == 1</p>
    @endif

    @if (1 > 2)
    @elseif (1 < 2)
        <p>1 < 2</p>
    @endif

    @if (1 > 2)
    @elseif (2 < 1)
    @else
        <p>1 < 2</p>
    @endif

    <!-- Looping -->
    <ul>
        @for ($a=1; $a<5; $a++)
            <li>{{ $a }}</li>
        @endfor
    </ul>

    <ul>
        <?php $a = 1; ?>
        @while ($a<5)
            <li>{{ $a }}</li>
            <?php $a += 1; ?>
        @endwhile
    </ul>

    @foreach ($data as $item)
        {{ $item['no'].' : '.$item['nama'] }}
    @endforeach

@endsection