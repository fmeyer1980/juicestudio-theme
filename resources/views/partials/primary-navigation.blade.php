@if($menuItems)
<nav class="hidden lg:block" aria-label="Primary Navigation">
    <ul class="primary-menu flex flex-wrap font-medium items-center gap-x-[1.8em] leading-flat">
        @foreach($menuItems as $item)
            @if($item->is_top_level)
                <li class="relative flex items-center {{ $item->has_children ? 'group has-dropdown' : '' }}"
                    @if($item->has_children)
                    x-data="{ open: false }"
                    @mouseenter="open = true"
                    @mouseleave="open = false"
                    @endif
                >
                    @if($item->is_services)
                        <button 
                            type="button"
                            class="dropdown-toggle flex items-center gap-[.5em] {{ $item->is_current ? 'underline underline-offset-4' : '' }}"
                            :aria-expanded="open"
                            @click="open = !open"
                        >
                            <span>{!! wp_kses_post($item->title) !!}</span>
                            <svg 
                                class="h-[1.2em] w-auto transition-transform" 
                                :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 24 24" 
                                fill="none" 
                                stroke="currentColor" 
                                stroke-width="1.5"
                            >
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        
                        <ul 
                            class="absolute top-[calc(100%+var(--size-100))] -left-600 mt-2 bg-light-glare text-dark rounded-lg min-w-[22rem] shadow-2xl shadow-black/25 z-50 p-400 before:absolute before:size-3 before:top-0 before:left-1/8 before:-translate-y-1/2 before:rotate-45 before:bg-light-glare after:absolute after:h-500 after:w-full after:top-0 after:-translate-y-full after:left-0"
                            role="menu"
                            x-show="open"
                            x-cloak
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            @click.away="open = false"
                        >
                            @foreach($services as $item)

                            @php
                                $custom_icon = get_field('custom_icon', $item->ID);
                            @endphp
                                <li class="relative flex gap-[1em] items-start py-200 px-300 hover:bg-primary/10 rounded-xl transition-colors duration-300 border-b border-primary/6 hover:border-primary/0">
                                    @if($item->icon_type == 'heroicon')
                                        @svg('heroicon-o-arrow-left', 'w-6 h-6', ['style' => ''])
                                    @elseif($custom_icon)
                                        {!! inline_svg($custom_icon['url'], 'h-auto w-650 mt-[.2em] text-primary shrink-0') !!}
                                    @endif
                                    <div class="flex flex-col space-y-[.3em]">
                                        <a 
                                            href="{{ get_permalink($item->ID) }}" 
                                            class="leading-none link-parent {{ $item->is_current ? '' : '' }}"
                                            role="menuitem"
                                        >
                                            {!! wp_kses_post($item->post_title) !!}
                                        </a>
                                        <span class="text-current/50 text-xs leading-tight text-pretty">{{ $item->menu_text }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <a 
                            href="{{ $item->url }}" 
                            class="flex items-center {{ $item->is_current ? 'underline underline-offset-4' : '' }}"
                        >
                            {!! wp_kses_post($item->title) !!}
                        </a>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
</nav>
@endif