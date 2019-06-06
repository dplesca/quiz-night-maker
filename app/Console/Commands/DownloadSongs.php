<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Quiz;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\File;

class DownloadSongs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'songs:download {quizid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download songs for a certain quiz';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $quiz = Quiz::find($this->argument('quizid'));
        if ($quiz == null) {
            return $this->error('This quiz does not exist');
        }

        $tempLocation = storage_path();
        $finalLocation = public_path('songs/quiz-'. $quiz->id);
        // dump($finalLocation);
        // File::makeDirectory($finalLocation, 0644, true);
        $this->line('Download songs for quiz: ' . $quiz->title);
        foreach ($quiz->rounds as $round){
            if ($round->type == 'song'){
                foreach ($round->songs as $song){
                    $this->line('Downloading ' . $song->artist . ' - ' . $song->song);
                    $downloadProcess = new Process([
                        "youtube-dl",
                        "--id",
                        "-f", "140",
                        $song->youtube_id,
                    ]);
                    $downloadProcess->run();
                    if (!$downloadProcess->isSuccessful()) {
                        $this->error('download for ' . $song->youtube_id . ' failed');
                    }
                    $this->line('Cut to duration for: ' . $song->artist . ' - ' . $song->song);
                    $cutProcess = new Process([
                        "ffmpeg",
                        "-i", $song->youtube_id.".m4a",
                        "-ss", $song->start,
                        "-t", $song->duration,
                        "-y", $finalLocation . '/' . $song->youtube_id . '.mp3',
                    ]);
                    $cutProcess->run();
                    $this->line('Finished: ' . $song->artist . ' - ' . $song->song);
                    //delete m4a file
                    unlink($song->youtube_id.".m4a");
                }
            }
        }
    }
}
