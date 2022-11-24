<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    @livewireStyles
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                    </div>
                                    <ul wire:sortable="reorder" class="list-group">
                                        @foreach ($products as $product)
                                            <li wire:sortable.item="{{ $product->id }}" wire:key="product-{{ $product->id }}" class="list-group-item">
                                                <h4 wire:sortable.handle>{{ $product->name }}</h4>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @livewireScripts
                   <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
{{--                <script>--}}
{{--                    let root = document.querySelector('[drag-root]')--}}

{{--                    root.querySelectorAll('[drag-item]').forEach(el => {--}}
{{--                        el.addEventListener('dragstart', e => {--}}
{{--                            e.target.setAttribute('dragging', true)--}}
{{--                            console.log('start')--}}
{{--                        })--}}
{{--                        el.addEventListener('drop', e => {--}}
{{--                            e.target.classList.remove('bg-blue-100')--}}
{{--                            console.log('drop')--}}

{{--                            let draggingEl = root.querySelector('[dragging]')--}}
{{--                            e.target.before(draggingEl)--}}
{{--                            console.log(draggingEl)--}}

{{--                            let component = window.livewire.find(--}}
{{--                                e.target.closest('[wire\\:id]').getAttribute('wire:id')--}}
{{--                            )--}}
{{--                            console.log(component)--}}

{{--                            let orderIds = Array.from(root.querySelectorAll('[drag-item]'))--}}
{{--                                .map(itemEl => itemEl.getAttribute('wire:key'))--}}
{{--                            console.log(orderIds)--}}

{{--                            component.call('reorder', orderIds)--}}
{{--                        })--}}
{{--                        el.addEventListener('dragenter', e => {--}}
{{--                            e.target.classList.add('bg-yellow-100')--}}
{{--                            e.preventDefault()--}}
{{--                            console.log('enter')--}}
{{--                        })--}}
{{--                        el.addEventListener('dragover', e => {--}}
{{--                            e.preventDefault()--}}
{{--                        })--}}
{{--                        el.addEventListener('dragleave', e => {--}}
{{--                            el.classList.remove('bg-blue-100')--}}
{{--                            console.log('leave')--}}
{{--                        })--}}
{{--                        el.addEventListener('dragend', e => {--}}
{{--                            e.target.removeAttribute('dragging')--}}
{{--                            console.log('end')--}}
{{--                        })--}}
{{--                    });--}}
{{--                </script>--}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>


