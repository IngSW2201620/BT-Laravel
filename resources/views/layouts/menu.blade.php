<li class="{{ Request::is('buses*') ? 'active' : '' }}">
    <a href="{!! route('buses.index') !!}"><i class="fa fa-edit"></i><span>buses</span></a>
</li>

<li class="{{ Request::is('routeStatuses*') ? 'active' : '' }}">
    <a href="{!! route('routeStatuses.index') !!}"><i class="fa fa-edit"></i><span>routeStatuses</span></a>
</li>

<li class="{{ Request::is('drivers*') ? 'active' : '' }}">
    <a href="{!! route('drivers.index') !!}"><i class="fa fa-edit"></i><span>drivers</span></a>
</li>

<li class="{{ Request::is('sellers*') ? 'active' : '' }}">
    <a href="{!! route('sellers.index') !!}"><i class="fa fa-edit"></i><span>sellers</span></a>
</li>

<li class="{{ Request::is('stops*') ? 'active' : '' }}">
    <a href="{!! route('stops.index') !!}"><i class="fa fa-edit"></i><span>stops</span></a>
</li>

<li class="{{ Request::is('busPositions*') ? 'active' : '' }}">
    <a href="{!! route('busPositions.index') !!}"><i class="fa fa-edit"></i><span>busPositions</span></a>
</li>

<li class="{{ Request::is('roads*') ? 'active' : '' }}">
    <a href="{!! route('roads.index') !!}"><i class="fa fa-edit"></i><span>roads</span></a>
</li>

<li class="{{ Request::is('roadStops*') ? 'active' : '' }}">
    <a href="{!! route('roadStops.index') !!}"><i class="fa fa-edit"></i><span>roadStops</span></a>
</li>

<li class="{{ Request::is('routes*') ? 'active' : '' }}">
    <a href="{!! route('routes.index') !!}"><i class="fa fa-edit"></i><span>routes</span></a>
</li>

<li class="{{ Request::is('tickets*') ? 'active' : '' }}">
    <a href="{!! route('tickets.index') !!}"><i class="fa fa-edit"></i><span>tickets</span></a>
</li>

