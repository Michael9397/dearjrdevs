<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="{{ $page->siteName }} Blog" href="/blog"
        class="ml-6 text-gray-700 hover:text-blue-600 {{ $page->isActive('/blog') ? 'active text-blue-600' : '' }}">
        Letters
    </a>

    <a title="{{ $page->siteName }} About" href="/why"
        class="ml-6 text-gray-700 hover:text-blue-600 {{ $page->isActive('/why') ? 'active text-blue-600' : '' }}">
        Why?
    </a>

    <a title="{{ $page->siteName }} Contact" href="/who"
        class="ml-6 text-gray-700 hover:text-blue-600 {{ $page->isActive('/who') ? 'active text-blue-600' : '' }}">
        Who made this?
    </a>
</nav>
