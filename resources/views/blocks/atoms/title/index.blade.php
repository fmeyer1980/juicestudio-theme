@php
  $text = get_field('text');
@endphp

<p {!! acf_inline_text_editing_attrs('text') !!} class="title {{ $text ? '' : 'is-placeholder' }}"> 
  {!! placeholder($text, 'Indtast din tekst her...') !!} 
</p>