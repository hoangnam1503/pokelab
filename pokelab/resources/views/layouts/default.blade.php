<!DOCTYPE html>
<html lang="en">
<head>
    @section('title')
        <title>PokeLab</title>
    @show

    {!! Html::style('css/main.css') !!}
</head>

<body>
<div class="nav-bars">
    <ul>
        <li><a href="#">
                <span class="nar-bar-logo logo-head">POKE</span><br>
                <span class="nav-bar-logo logo-foot">LAB</span>
            </a></li>
        <li><a href="#" class="nav-bar-active">
                <span class="nav-bar-icon icon">Home</span>
                <span class="nar-bar-text">Home</span>
            </a></li>
        <li><a href="/battle/type-chart" class="nav-bar">
                <span class="nav-bar-icon icon">Type</span>
                <span class="nar-bar-text">Battle</span>
            </a></li>
        <li><a href="#" class="nav-bar">
                <span class="nav-bar-icon icon">Home</span>
                <span class="nar-bar-text">Home</span>
            </a></li>
        <li><a href="#" class="nav-bar">
                <span class="nav-bar-icon icon">Home</span>
                <span class="nar-bar-text">Home</span>
            </a></li>
    </ul>
</div>

<div class="content">
    <div class="top-bar">
        <div class="top-wrapper">
            <div class="left-item">
                <a href="/"><span class="logo">Home</span></a>
            </div>
            <div class="right-item">
                {!! Form::open(['route' => 'search', 'method' => 'GET', 'class' => 'search-wrapper']) !!}
                {!! Form::text('pk', '', array('placeholder' => 'Search here...', 'class' => 'search-input')) !!}
                <button type="submit">Search</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="page-content">
        @yield('content')
    </div>
</div>


</body>
</html>