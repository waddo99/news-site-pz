<div class="row justify-content-md-center">
    <div class="col-10">
        <a class="btn {{ isset($button) ? $button : 'btn-info' }}" href="{{ isset($route) ? isset($routeArgs) ? route($route, $routeArgs) : route($route) : 'javascript:history.back();'}}" role="button"
           id="newBtn">
            <i class="fas fa-angle-double-left"></i>
            {{ isset($label) ? $label : 'Back' }}
        </a>
    </div>
</div>
