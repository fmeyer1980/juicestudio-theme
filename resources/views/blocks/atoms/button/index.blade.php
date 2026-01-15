@php
    $link = get_field('link');
    $icon = get_field('icon');
    $show_icon = get_field('show_icon');
    $icon_position = get_field('icon_position');
  
    $is_outline = str_contains($block->className ?? '', 'is-style-outline');
    $is_fill = empty($block->className) || str_contains($block->className ?? '', 'is-style-fill');
    
    $style = $is_outline ? 'ring ring-inset ring-current' : '';
    
    $bg_color = ($is_fill && empty($block->backgroundColor))
        ? 'bg-light-glare/20 backdrop-blur-md'
        : 'bg-' . ($block->backgroundColor ?? '');
        
    $text_color = ($is_fill && empty($block->textColor))
        ? 'text-light-glare'
        : 'text-' . ($block->textColor ?? '');
@endphp


<a 
  class="btn {{ $style }} {{ $bg_color }} {{ $text_color }}" 
  {{-- {!! acf_inline_toolbar_editing_attrs(['link','icon','icon_position']) !!} --}}
  {!! acf_inline_toolbar_editing_attrs(
    [
        [
            'field_name' => 'link',
            'field_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18.364 15.536L16.95 14.12l1.414-1.414a5 5 0 0 0-7.071-7.071L9.878 7.05L8.464 5.636l1.414-1.414a7 7 0 0 1 9.9 9.9zm-2.829 2.828l-1.414 1.414a7 7 0 0 1-9.9-9.9l1.415-1.414L7.05 9.88l-1.414 1.414a5 5 0 0 0 7.07 7.071l1.415-1.414zm-.707-10.607l1.415 1.415l-7.072 7.07l-1.414-1.414z"/></svg>',
            'field_label' => 'Link'
        ],
        [
            'field_name' => 'show_icon',
            'field_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 7a5 5 0 0 0 0 10h8a5 5 0 0 0 0-10zm0-2h8a7 7 0 1 1 0 14H8A7 7 0 1 1 8 5m0 10a3 3 0 1 1 0-6a3 3 0 0 1 0 6"/></svg>',
            'field_label' => 'Show icon'
        ],
        [
            'field_name' => 'icon',
            'field_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path fill="currentColor" d="M500.3 7.3c7.4 6 11.7 15.1 11.7 24.7v144c0 26.5-28.7 48-64 48s-64-21.5-64-48s28.7-48 64-48V71l-96 19.2V208c0 26.5-28.7 48-64 48s-64-21.5-64-48s28.7-48 64-48V64c0-15.3 10.8-28.4 25.7-31.4l160-32c9.4-1.9 19.1.6 26.6 6.6zM74.7 304l11.8-17.8c5.9-8.9 15.9-14.2 26.6-14.2h61.7c10.7 0 20.7 5.3 26.6 14.2l11.9 17.8H240c26.5 0 48 21.5 48 48v112c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V352c0-26.5 21.5-48 48-48zM192 408a48 48 0 1 0-96 0a48 48 0 1 0 96 0m286.7-129.7L440.3 368H496c6.7 0 12.6 4.1 15 10.4s.6 13.3-4.4 17.7l-128 112c-5.6 4.9-13.9 5.3-19.9.9s-8.2-12.4-5.3-19.2l38.3-89.8H336c-6.7 0-12.6-4.1-15-10.4s-.6-13.3 4.4-17.7l128-112c5.6-4.9 13.9-5.3 19.9-.9s8.2 12.4 5.3 19.2zm-339-59.2c-6.5 6.5-17 6.5-23 0l-96.8-99.9c-28-29-26.5-76.9 5-103.9c27-23.5 68.4-19 93.4 6.5l10 10.5l9.5-10.5c25-25.5 65.9-30 93.9-6.5c31 27 32.5 74.9 4.5 103.9l-96.4 99.9z"/></svg>',
            'field_label' => 'Icon'
        ],
        [
            'field_name' => 'icon_position',
            'field_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.293 7.293a1 1 0 0 1 1.414 0l4 4a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414-1.414L18.586 13H5.414l2.293 2.293a1 1 0 1 1-1.414 1.414l-4-4a1 1 0 0 1 0-1.414l4-4a1 1 0 1 1 1.414 1.414L5.414 11h13.172l-2.293-2.293a1 1 0 0 1 0-1.414"/></svg>',
            'field_label' => 'Icon position'
        ]
    ],
    [
        'toolbar_icon' => '',
        'toolbar_title' => 'Link',
        'Placeholder' => 'dsaf'
    ]
  ) !!}
  href="{{ $link['url'] ?? '#' }}">
  <span>{{ $link['title'] ?? 'Læs mere' }}</span>
  @if($show_icon == true)
    @svg($icon, 'w-auto h-[.8em]')
  @endif
</a>