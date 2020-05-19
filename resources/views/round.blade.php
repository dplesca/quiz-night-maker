<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Round {{$round->order}} - {{$round->title}}</title>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/3.8.0/css/reset.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/3.8.0/css/reveal.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/3.8.0/css/theme/{{$round->theme}}.css">

	</head>
	<body>
		<div class="reveal">
			<div class="slides">
                @if ($round->type == 'text')
                @foreach ($round->questions as $question)
				<section>
                    <small>{{$round->quiz->title}} - Round {{$round->order}}: {{$round->title}}</small>
                    @if ($question->question !== "-")
                    <h3>{{$question->question}}</h3>
                    @else
                    <br />
                    @endif
                    @if ($question->image)
                    <img src="{{$question->image}}" alt="question {{$question->id}}" height="400">
                    @endif
                    @if ($type == 'answers')
                    <h4 class="answer">Raspuns: <a href="#">{{$question->answer}}</a></h4>
                    @endif
                </section>
                @endforeach
                @else
                @foreach ($round->songs as $question)
                <section>
                    <small>{{$round->quiz->title}} - Round {{$round->order}}: {{$round->title}}</small>
                    <div style="width:500px;margin:0 auto;">
                        <audio style="width:100%;" controls src="/songs/quiz-{{$round->quiz->id}}/{{$question->youtube_id}}.mp3"></audio>
                    </div>
                    @if ($type == 'answers')
                    <h5 class="answer">Raspuns: <a href="#">{{$question->artist}} - {{ $question->song }}</a></h5>
                    @endif
                </section>
                @endforeach
                @endif
			</div>
		</div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/3.8.0/js/reveal.min.js"></script>
        <script src="https://cdn.plyr.io/3.5.3/plyr.js"></script>
        <script>
        Reveal.initialize({ backgroundTransition: 'zoom' });
        </script>
	</body>
</html>