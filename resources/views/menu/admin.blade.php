<nav class="header__menu">
    <ul class="ul flex padding-0">
        <li><a href="{{ route('index') }}" class="{{ request()->routeIs('index') ? 'active' : '' }}">Главная</a></li>
        <li><a href="{{ route('admin.news') }}" class="{{ request()->routeIs('admin.news') ? 'active' : '' }}">Новости Админ</a></li>
        <li><a href="#">Категории</a></li>
        <li><a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">Админка</a></li>
        <li><a href="{{ route('admin.profiles.index') }}" class="{{ request()->routeIs('admin.profiles.index') ? 'active' : '' }}">Пользователи</a></li>
        <li><a href="{{ route('news.create') }}" class="{{ request()->routeIs('news.create') ? 'active' : '' }}">Добавить статью</a></li>
    </ul>
</nav>
