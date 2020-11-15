<!doctype html>
<html lang="en">

<head>
    @include('ui::cp.head')
</head>

<body>
    <!-- cp.blade.php -->
    <div class="grid grid-cols-12 min-h-screen">
        <aside class="col-span-12 md:col-span-3 lg:col-span-3 xl:col-span-2">
            @include('ui::cp.sidebar')
        </aside>
        <main class="col-span-12 md:col-span-9 lg:col-span-9 xl:col-span-10 bg-gray-100">

            @include('ui::cp.top')
            @include('ui::cp.content')

        </main>

    </div>

    @include('ui::cp.assets')
    @include('ui::cp.messages')

</body>

</html>
