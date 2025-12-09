<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->

<div class="search-bar">
    <form method="get" action="{{ $action }}" accept-charset="UTF-8" class="search-form">
        <input type="search" name="needle" value="{{ request('needle') }}" placeholder="Keresés">
        <button type="submit" title="Keres">
            <i class="fa fa-search"></i>
        </button>
    </form>
</div>
