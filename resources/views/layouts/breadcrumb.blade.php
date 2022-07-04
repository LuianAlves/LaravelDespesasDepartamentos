@php
    $prefix = Request::route()->getName();
    $title = explode('.', $prefix);
@endphp

<div class="pagetitle">
    {{-- <h1>{{ ucfirst($title[0]) }}</h1> --}}
    <nav>
        <ol class="breadcrumb p-2" style="background: rgba(235, 235, 235, 0.795); border-radius: 8px;">
            <li class="breadcrumb-item"><a style="color:rgb(40, 144, 241);" href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ ucfirst($title[0]) }}</li>
        </ol>
    </nav>
</div>