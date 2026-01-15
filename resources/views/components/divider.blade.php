@php
    $_color = match($color) {
        'light' => 'border-t-dark-shade/20 border-b-light-glare/15',
        'dark' => 'border-t-dark-shade/15 border-b-light-glare/15'
    };
@endphp
<hr class="{{ $_color . '' . ($class ?? ' absolute left-1/2 -translate-x-1/2 z-10 w-full max-w-[var(--container-width)]') }} border border-x-0" />