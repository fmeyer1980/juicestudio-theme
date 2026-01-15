<header class="relative bg-primary text-light-glare border-b border-light-glare/10 after:absolute after:w-full after:h-px after:bg-dark-shade/20 after:left-0 after:bottom-0">
    <div class="wrapper h-lg flex items-center justify-end gap-gutter">
        @include('components.site-logo', ['class' => "mr-auto *:h-600"])
        @include('partials.primary-navigation')
        <button class="popup__open-modal btn py-[.8em]" data-style="light-solid">En kop kaffe</button>
    </div>
</header>