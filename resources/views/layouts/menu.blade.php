<li class="{{ Request::is('administradors*') ? 'active' : '' }}">
    <a href="{!! route('administradors.index') !!}"><i class="fa fa-edit"></i><span>Administradors</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('tickets*') ? 'active' : '' }}">
    <a href="{!! route('tickets.index') !!}"><i class="fa fa-edit"></i><span>Tickets</span></a>
</li>

<li class="{{ Request::is('sellers*') ? 'active' : '' }}">
    <a href="{!! route('sellers.index') !!}"><i class="fa fa-edit"></i><span>Sellers</span></a>
</li>

<li class="{{ Request::is('sellers*') ? 'active' : '' }}">
    <a href="{!! route('sellers.index') !!}"><i class="fa fa-edit"></i><span>Sellers</span></a>
</li>

<li class="{{ Request::is('roads*') ? 'active' : '' }}">
    <a href="{!! route('roads.index') !!}"><i class="fa fa-edit"></i><span>roads</span></a>
</li>

<li class="{{ Request::is('buses*') ? 'active' : '' }}">
    <a href="{!! route('buses.index') !!}"><i class="fa fa-edit"></i><span>buses</span></a>
</li>

<li class="{{ Request::is('routeschedules*') ? 'active' : '' }}">
    <a href="{!! route('routeschedules.index') !!}"><i class="fa fa-edit"></i><span>routeschedules</span></a>
</li>

<li class="{{ Request::is('drivers*') ? 'active' : '' }}">
    <a href="{!! route('drivers.index') !!}"><i class="fa fa-edit"></i><span>drivers</span></a>
</li>

<li class="{{ Request::is('stops*') ? 'active' : '' }}">
    <a href="{!! route('stops.index') !!}"><i class="fa fa-edit"></i><span>stops</span></a>
</li>

<li class="{{ Request::is('passengers*') ? 'active' : '' }}">
    <a href="{!! route('passengers.index') !!}"><i class="fa fa-edit"></i><span>passengers</span></a>
</li>

