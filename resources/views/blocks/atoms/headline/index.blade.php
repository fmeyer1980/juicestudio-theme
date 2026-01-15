@php
  $headline = get_field('headline');
  $headline = preg_replace('/\[h\](.*?)\[\/h\]/', '<span class="text-primary-shade">$1</span>', $headline);
  $tag = get_field('tag');
  $fontSize = get_field('font_size');

  $_fontSize = match($fontSize) {
    'small' => 'text-600 max-w-[45ch]',
    'medium' => 'text-700 max-w-[35ch]',
    'large' => 'text-800 max-w-[30ch]',
    'xl' => 'text-950 max-w-[25ch]',
    default => 'text-700 max-w-[30ch]'
  };
@endphp


<{{ $tag ?? 'h2' }} class="{{ $_fontSize }}" {!! acf_inline_toolbar_editing_attrs(
    [
      [
          'field_name' => 'tag',
          'field_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512"><path fill="currentColor" d="M221.631 109L109.92 392h58.055l24.079-61h127.892l24.079 61h58.055L290.369 109Zm-8.261 168L256 169l42.63 108Z"/><path fill="currentColor" d="M16 496h480V16H16ZM48 48h416v416H48Z"/></svg>',
          'field_label' => 'Tag'
      ],
      [
          'field_name' => 'font_size',
          'field_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M2 4v3h5v12h3V7h5V4zm19 5h-9v3h3v7h3v-7h3z"/></svg>',
          'field_label' => 'Font size'
      ],
    ]
  ) !!} 
  {!! acf_inline_text_editing_attrs('headline') !!}> 
  {!! placeholder($headline, 'Indtast din overskrift her...') !!}
</{{ $tag ?? 'h2' }}>