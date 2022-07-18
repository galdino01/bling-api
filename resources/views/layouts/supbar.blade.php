<ul class="nav supbar">
    <li class="nav-item">
        <a class="nav-link @if (Route::getCurrentRoute()->getName() == 'dashboard') supbar-selected-link @endif" href="{{ route('dashboard') }}" title="Área da Dashboard">
            <span class="text-light">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (Route::getCurrentRoute()->getName() == 'products.index') supbar-selected-link @endif" href="{{ route('products.index') }}" title="Área de Produtos">
            <span class="text-light">Produtos</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (Route::getCurrentRoute()->getName() == 'orders.index') supbar-selected-link @endif" href="{{ route('orders.index') }}" title="Área de Pedidos">
            <span class="text-light">Pedidos</span>
        </a>
    </li>
</ul>
