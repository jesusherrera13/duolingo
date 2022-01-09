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


    .hanzi {
        font-family: 'SimHei';
        font-size: 18px;
    }

    .phrase, .pinyin {
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
    @foreach($data as $row)
      @if($phrase)
      <div class="phrase">{{ $row->phrase }}</div>
      @endif

      @if($hanzi)
      <p class="hanzi">{{ $row->hanzi }}</p>
      @endif
      
      @if($pinyin)
      <small class="pinyin">{{ $row->pinyin }}</small>
      @endif
    @endforeach
  </body>
</html>
 
