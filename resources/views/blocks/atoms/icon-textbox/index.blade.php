@php
  $headline = get_field('headline');
  $text = get_field('text');
  $icon = get_field('icon') ?: 'arrow-right';
@endphp

<li class="flex flex-col flow-y flow-space-1em p-800">
    <span {!! acf_inline_toolbar_editing_attrs(['icon']) !!}>@svg("icons/{$icon}", 'w-auto h-[2.5em] text-primary')</span>
    <h3 class="text-400" {!! acf_inline_text_editing_attrs('headline') !!}>{{ $headline }}</h3>
    <p class="text-xs text-current/70" {!! acf_inline_text_editing_attrs('text') !!}>{{ $text }}</p>
</li>