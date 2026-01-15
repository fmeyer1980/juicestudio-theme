<footer class="wrapper border-l-gutter border-transparent relative bg-primary text-light-glare [&_li]:text-current/70 [&_a]:hover:text-light-glare [&_a]:transition-colors ">
    <div class=" pt-lg pb-700 flow-y flow-space-900 md:min-w-min md:max-w-[80%] lg:max-w-[65%]">
        <div>
            <h2 class="sr-only">Find flere oplysninger om Juice Studio</h2>
            <p class="h2 text-800">Flere juicy detaljer</p>
        </div>
        <div class="grid md:grid-cols-3 gap-900 justify-items-start">
            <div class="space-y-200 min-w-max">
                <h3 class="text-400">{{ $site_name }} I/S</h3>
                <ul class="space-y-[.2em]">
                    <li><a href="mailto:{{ $email }}">{{ $email }}</a></li>
                    <li><a href="mailto:{{ $phone }}">{{ $phone }}</a></li>
                    <li><span>CVR: 43866540</span></li>
                </ul>
                <ul>
                    <li>Nørrebrogade 66D,</li>
                    <li>2200 København N</li>
                </ul>
                <ul class="flex items-center gap-1.5">
                    <li><a href=""><x-fab-instagram class="w-6 h-6"/></a></li>
                    <li><a href=""><x-fab-linkedin class="w-6 h-6"/></a></li>
                </ul>
            </div>
            <div class="space-y-200 min-w-max">
                <h3 class="text-400">Seks bureauer i ét</h3>
                <ul class="space-y-2">
                @if($services_list)
                    @foreach($services_list as $item)
                        <li>
                            <a href="{{ get_permalink($item->ID) }}">
                                {{ $item->post_title }}
                            </a>
                        </li>
                    @endforeach
                @endif
                </ul>
            </div>
            <div class="space-y-200 min-w-max">
                <h3 class="text-400">Se også</h3>
                @if (has_nav_menu('footer_navigation'))
                <nav class="" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
                    {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'space-y-2',  'container' => 'ul', 'echo' => false]) !!}
                </nav>
                @endif
            </div>
        </div>
        @include('components.divider', ['color' => 'light', 'class' => ''])
        <div class="flow-space-700 flex flex-wrap gap-y-200 gap-x-gutter justify-between">
            @include('components.site-logo', ['class' => "*:h-600 inline-block"])
            <p class="text-current/50">All rights reserved 2026 © {{ $site_name }}.dk</p>
        </div>
    </div>
    @svg('juice-pattern-two', 'absolute top-0 right-container z-10 h-full w-auto')
</footer>