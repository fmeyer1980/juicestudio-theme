@if($services)
    <ul class="mt-2 flex flex-wrap gap-100">
        @foreach($services as $item)
            <li class="text-[12px] font-bold relative z-20">
                <a class="flex items-center gap-[.4em] py-[.4em] px-[1em] border border-dark-shade/10 rounded-full hover:bg-primary hover:text-light-glare transition-colors duration-300" href="{{ get_permalink($item->ID) }}">
                    <span>{{ $item->post_title }}</span>
                </a>
            </li>
        @endforeach
    </ul>
@endif