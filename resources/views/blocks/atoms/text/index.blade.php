@php
  $text = get_field('text');
  $fontSize = get_field('font_size');

  $_fontSize = match($fontSize) {
    'small' => 'text-sm',
    'medium' => 'text-base',
    'large' => 'text-300',
    'xl' => 'text-400',
    default => 'text-base'
  };
@endphp


<p class="{{ $_fontSize }} {{ block_text_color($block) }}" {!! acf_inline_toolbar_editing_attrs(
    [
      [
          'field_name' => 'font_size',
          'field_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M2 4v3h5v12h3V7h5V4zm19 5h-9v3h3v7h3v-7h3z"/></svg>',
          'field_label' => 'Font size'
      ],
    ]
  ) !!} 
  {!! acf_inline_text_editing_attrs('text') !!}> 
  {!! placeholder($text, 'Indtast din tekst her...') !!} 
</p>