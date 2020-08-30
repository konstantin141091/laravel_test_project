<nav class="header__menu">
    <ul class="ul flex padding-0">
        <li><a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
                Админка</a></li>
        <li><a href="{{ route('index') }}">Главная</a></li>
        <li><a href="{{ route('admin.news.index') }}" class="
                                    {{ request()->routeIs('admin.news.index') ? 'active' : '' }}
                                    {{ request()->routeIs('admin.news.show') ? 'active' : '' }}
                                    {{ request()->routeIs('admin.news.create') ? 'active' : '' }}">
                Новости Админ</a></li>
        <li><a href="{{ route('admin.category.index') }}" class="
            {{ request()->routeIs('admin.category.index') ? 'active' : '' }}
            {{ request()->routeIs('admin.category.show') ? 'active' : '' }}
            {{ request()->routeIs('admin.category.create') ? 'active' : '' }}">
                Категории Админ</a></li>
        <li><a href="{{ route('parser.all') }}" class="{{ request()->routeIs('parser.all') ? 'active' : '' }}">Парсер Новости</a></li>
        <li><a href="{{ route('admin.profiles.index') }}" class="{{ request()->routeIs('admin.profiles.index') ? 'active' : '' }}">
                Пользователи</a></li>
{{--        <li><a href="{{ route('admin.news.create') }}" class="{{ request()->routeIs('admin.news.create') ? 'active' : '' }}">--}}
{{--                Добавить статью</a></li>--}}
{{--        <li><a href="{{ route('admin.category.create') }}" class="{{ request()->routeIs('admin.category.create') ? 'active' : '' }}">--}}
{{--                Добавить категорию</a></li>--}}
        <li><a href="{{ route('admin.resources.index') }}" class="
                        {{ request()->routeIs('admin.resources.index') ? 'active' : '' }}
                        {{ request()->routeIs('admin.resources.create') ? 'active' : '' }}">
                Парсер ресурсы</a></li>
    </ul>
</nav>
