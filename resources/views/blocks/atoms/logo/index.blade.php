@php
    $logo = get_field('logo');
    $size = get_field('size');

    $_size = match($size) {
        'small' => 'h-400',
        'large' => 'h-600',
        default => 'h-500'
    };
@endphp
<li {!! acf_inline_toolbar_editing_attrs(
    [
      [
          'field_name' => 'logo',
          'field_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512"><path fill="currentColor" d="M221.631 109L109.92 392h58.055l24.079-61h127.892l24.079 61h58.055L290.369 109Zm-8.261 168L256 169l42.63 108Z"/><path fill="currentColor" d="M16 496h480V16H16ZM48 48h416v416H48Z"/></svg>',
          'field_label' => 'Logo'
      ],
      [
          'field_name' => 'size',
          'field_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M2 4v3h5v12h3V7h5V4zm19 5h-9v3h3v7h3v-7h3z"/></svg>',
          'field_label' => 'Size'
      ],
    ]
  ) !!} >
    @if($logo && isset($logo['url']))
        @if(str_ends_with($logo['url'], '.svg'))
            {!! inline_svg($logo['url'], $_size . ' w-auto text-current opacity-70') !!}
        @else
            <img loading="lazy" class="{{ $_size }} w-auto opacity-70" src="{{ $logo['url'] }}" alt="{{ $logo['alt'] ?? '' }}">
        @endif

        @else
        <span>Upload et logo</span>
    @endif
</li>