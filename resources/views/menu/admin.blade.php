<nav class="header__menu">
    <ul class="ul flex padding-0">
        <li><a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
                Админка</a></li>
        <li><a href="{{ route('index') }}">Главная</a></li>
        <li><a href="{{ route('admin.news.index') }}" class="
                                    {{ request()->routeIs('admin.news.index') ? 'active' : '' }}
                                    {{ request()->routeIs('admin.news.show') ? 'active' : '' }}">
                Новости Админ</a></li>
        <li><a href="{{ route('admin.category.index') }}" class="
            {{ request()->routeIs('admin.category.index') ? 'active' : '' }}
            {{ request()->routeIs('admin.category.show') ? 'active' : '' }}">
                Категории Админ</a></li>
        <li><a href="{{ route('parser') }}" class="{{ request()->routeIs('parser') ? 'active' : '' }}">Парсер</a></li>
        <li><a href="{{ route('admin.profiles.index') }}" class="{{ request()->routeIs('admin.profiles.index') ? 'active' : '' }}">
                Пользователи</a></li>
        <li><a href="{{ route('admin.news.create') }}" class="{{ request()->routeIs('admin.news.create') ? 'active' : '' }}">
                Добавить статью</a></li>
        <li><a href="{{ route('admin.category.create') }}" class="{{ request()->routeIs('admin.category.create') ? 'active' : '' }}">
                Добавить категорию</a></li>
    </ul>
</nav>
