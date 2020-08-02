<div class="widget-sidebar sidebar-search">
    <h5 class="sidebar-title">Pesquisar</h5>
    <div class="sidebar-content">
        <form method="get" action="{{ route('home.blog.search') }}">
            <div class="input-group">
                <input type="text" name="termo" required class="form-control" placeholder="Pesquisar por..."
                    aria-label="Pesquisar por...">
                <span class="input-group-btn">
                    <button class="btn btn-secondary btn-search" type="submit">
                        <span class="ion-android-search"></span>
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>