<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    @font-face {
      font-family: 'SimHei';
      src: url('{{ asset("assets/fonts/SimHei.ttf") }}') format('truetype');
    }

    .phrase {
        font-family: 'Roboto';
        font-size: 18px;
    }
    .hanzi {
        font-family: 'SimHei';
        font-size: 18px;
    }

    .pinyin {
      font-family:
		system-ui,
		-apple-system, /* Firefox supports this but not yet `system-ui` */
		'Segoe UI',
		Roboto,
		Helvetica,
		Arial,
		sans-serif,
		'Apple Color Emoji',
		'Segoe UI Emoji';
        font-size: 18px;
    }
</style>
    <!-- Bootstrap CSS -->
    <title>Duolingo</title>
  </head>
  <body>
    @if($phrase)
    <div class="phrase">{{ $practice->phrase }}</div>
    @endif

    @if($hanzi)
    <p class="hanzi">{{ $practice->hanzi }}</p>
    @endif
    
    @if($pinyin)
    <small class="pinyin">{{ $practice->pinyin }}</small>
    @endif
  </body>
</html>
 
