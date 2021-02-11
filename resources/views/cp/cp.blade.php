<!-- cp.blade.php -->
<!doctype html>
<html lang="en">

<?php
/**
 * @var \Streams\Core\Entry\Contract\EntryInterface|\Streams\Core\Criteria\Criteria $theme
 */
$theme = Streams::entries('cp.themes')->find(Config::get('streams.ui.cp.theme', 'default'));

View::share('theme', $theme);
?>

<head>
    @include('ui::cp.head')
</head>


<body class="cp-body" x-data="{brand_mode: '{{ $theme->brand_mode }}'}">

<div class="cp-container">
    <header class="cp__header">header</header>
    <main class="cp__content">content</main>
    <nav class="cp__sidebar-1 cp__sidebar">sidebar-1</nav>
    <nav class="cp__sidebar-2 cp__sidebar">sidebar-2</nav>
    <footer class="cp__footer">footer</footer>
</div>


{{--

<header>…</header>
<div class="HolyGrail-body">
    <main class="HolyGrail-content">…</main>
    <nav class="HolyGrail-nav">…</nav>
    <aside class="HolyGrail-ads">…</aside>
</div>
<footer>…</footer>
</body>
{{-- <body class="ls-cp --topbar-brand --topbar-fixed"> --} }
<body class="ls-cp {{ $theme->brand_mode }}">

<div class="ls-cp__layout">

    @include('ui::cp.sidebar')

    <main class="">
        @include('ui::cp.top')
        @include('ui::cp.content')
    </main>

</div>

@include('ui::cp.assets')
@include('ui::cp.messages')
--}}
{{-- @include('ui::cp.surfaces')
@include('ui::cp.modal') --}}

</body>

</html>
