<ul class="navbar-nav justify-content-start flex-grow-1 sidebar">
    <li class="nav-item">
        <a class="nav-link text-light fw-bold p-3 d-flex align-items-center @if (Route::getCurrentRoute()->getName() == 'dashboard') sidebar-selected-link @endif" href="{{ route('dashboard') }}" title="Área da Dashboard">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="ms-3">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light fw-bold p-3 d-flex align-items-center @if (Route::getCurrentRoute()->getName() == 'products.index') sidebar-selected-link @endif" href="{{ route('products.index') }}" title="Área de Produtos">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="ms-3">Produtos</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light fw-bold p-3 d-flex align-items-center @if (Route::getCurrentRoute()->getName() == 'orders.index') sidebar-selected-link @endif" href="{{ route('orders.index') }}" title="Área de Pedidos">
            <i class="fa-solid fa-boxes-packing"></i>
            <span class="ms-3">Pedidos</span>
        </a>
    </li>
</ul>