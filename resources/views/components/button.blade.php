<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    @props(['type'])

<button class="btn btn-{{ $type }}">
    {{ $slot }}
</button>
</div>