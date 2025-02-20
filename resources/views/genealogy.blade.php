<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        {{-- <a class="" href="{{ route('genealogy') }}">
            Genealogy Tree
        </a> --}}
        <div id="app">
            <genealogy-tree :tree-data="{{ json_encode($treeData) }}"></genealogy-tree>
        </div>
    </body>
    @vite(['resources/js/app.js'])
</html>
