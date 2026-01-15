@php
    $title = get_field('title');
    $show_text = get_field('show_text');
    $text = get_field('text');
    $button_text = get_field('button_text');
    $input_placeholder_text = get_field('input_placeholder_tekst');
@endphp

<div class="flex flex-col space-y-3">
    @if($title)
        <strong class="text-xs" {!! acf_inline_text_editing_attrs('title') !!}>{{ $title }}</strong>
    @endif
    @if($show_text and $text)
        <p {!! acf_inline_text_editing_attrs('text') !!} >{{ $text }}</p>
    @endif
    <form
        method="post"
        action="{{ admin_url('admin-post.php') }}"
        class="flex flex-wrap justify-between items-center bg-light-glare p-[4px] rounded-md w-full max-w-[32rem] ring-1 ring-dark/10 focus-within:ring-dark/50"
    >
        <input type="hidden" name="action" value="simple_form_submit">
        <input
            type="email"
            name="email"
            required
            placeholder="{{ $input_placeholder_text }}"
            class="border-0 grow-999 text-xxs placeholder:text-dark-shade/70 focus:ring-0"
            
        >
        @if(request()->get('success'))
            <p class="text-green-600 text-xs mt-2">Tak for din tilmelding 🎉</p>
        @endif

        @if(request()->get('error') === 'invalid_email')
            <p class="text-red-600 text-xs mt-2">Indtast en gyldig e-mail.</p>
        @endif
        <{{ $is_preview ? 'div' : 'button type="submit"' }} class="js-editor-disable-submit btn grow" data-style="dark-solid">@svg('arrow-right', 'h-[.9em] w-auto text-primary')<span {!! acf_inline_text_editing_attrs('button_text') !!}>{{ $button_text }}</span></{{ $is_preview ? 'div' : 'button' }}>
    </form>
</div>