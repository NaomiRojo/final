@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 80px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tienda</li>

            <li class="breadcrumb-item"><a href="/login">Ingresar</a></li>
            <li class="breadcrumb-item"><a href="/register">Registrarse</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-7">
                    <h4>Productos</h4>
                </div>
                <div class="col-lg-6">
                    <form id="search-form" method="GET">
                        <div class="input-group">
                            <input id="search-input" type="text" class="form-control" placeholder="Buscar productos..." name="query">
                            <div class="input-group-append">
                                <button id="search-btn" class="btn btn-outline-secondary" type="button">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 mb-4">
                    <h5>Filtrar por Categoría</h5>
                    <select class="form-select" id="category-select">
                        <option value="">Todas las categorías</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <div class="row" id="product-list">
                @foreach($products as $pro)
                <div class="col-lg-3" data-category-id="{{ $pro->category_id }}" data-product-name="{{ strtolower($pro->name) }}">
                    <div class="card" style="margin-bottom: 20px; height: auto;">
                        <img src="/images/{{ $pro->image_path }}" class="card-img-top mx-auto" style="height: 150px; width: 150px;display: block;" alt="{{ $pro->image_path }}">
                        <div class="card-body">
                            <a href="#">
                                <h6 class="card-title">{{ $pro->name }}</h6>
                            </a>
                            <p>bs. {{ $pro->price }}</p>
                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
                                <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                                <input type="hidden" value="1" id="quantity" name="quantity">
                                <div class="card-footer" style="background-color: white;">
                                    <div class="row">
                                        <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                            <i class="fa fa-shopping-cart"></i> agregar al carrito
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category-select');
        const searchBtn = document.getElementById('search-btn');
        const searchInput = document.getElementById('search-input');

        categorySelect.addEventListener('change', function() {
            filterByCategory(categorySelect.value);
        });

        searchBtn.addEventListener('click', function() {
            filterBySearch(searchInput.value);
        });

        searchInput.addEventListener('keyup', function() {
            filterBySearch(searchInput.value);
        });

        function filterByCategory(categoryId) {
            const productList = document.getElementById('product-list').children;
            for (let i = 0; i < productList.length; i++) {
                const product = productList[i];
                if (!categoryId || product.getAttribute('data-category-id') === categoryId) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            }
        }

        function filterBySearch(query) {
            const productList = document.getElementById('product-list').children;
            for (let i = 0; i < productList.length; i++) {
                const product = productList[i];
                const productName = product.getAttribute('data-product-name');
                if (!query || productName.includes(query.toLowerCase())) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            }
        }
    });
</script>
