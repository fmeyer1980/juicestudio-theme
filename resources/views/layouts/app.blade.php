<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
    @vite('resources/css/app.css')
    <script src="test"></script>
  </head>

  <body @php(body_class('overflow-x-clip'))>
      @php(wp_body_open())
      <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content', 'sage') }}
      </a>
      @include('partials.site-head')
      <main id="main">
        @yield('content')
      </main>
      @include('components.popup')
      @include('partials.site-foot')

      @php(do_action('get_footer'))
      @php(wp_footer())

      @vite('resources/js/app.js')
  </body>
</html>
