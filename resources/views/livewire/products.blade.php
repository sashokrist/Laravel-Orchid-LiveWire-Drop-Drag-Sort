<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>
                <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Products') }}</div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Drag</th>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                            </tr>
                                            </thead>
                                            @foreach($products as $product)
                                                <tbody wire:sortable="updateTaskOrder">
                                                <tr wire:sortable.item="{{ $product->id }}" wire:key="product-{{ $product->id }}" wire:sortable.handle>
                                                    <th scope="row">|||</th>
                                                    <th>{{ $product->id }}</th>
                                                    <td>{{ $product->name }}</td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @livewireScripts
                    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

@push('styles')
    <styles>
        .draggable-mirror{
        background-color: white;
        width: 950px;
        display: flex;
        justify-content: space-between;
        }
    </styles>
@endpush
