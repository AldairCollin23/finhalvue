<li class="nav-item">
    <a href="{{ route('vuevendedor.index') }}"
       class="nav-link {{ Request::is('vuevendedor*') ? 'active' : '' }}">
        <p>Vendedor</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('vuecliente.index') }}"
       class="nav-link {{ Request::is('vuecliente*') ? 'active' : '' }}">
        <p>Cliente</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('vueproducto.index') }}"
       class="nav-link {{ Request::is('vueproducto*') ? 'active' : '' }}">
        <p>Productos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('vuedetalle.index') }}"
       class="nav-link {{ Request::is('vuedetalle*') ? 'active' : '' }}">
        <p>Detalle</p>
    </a>
</li>