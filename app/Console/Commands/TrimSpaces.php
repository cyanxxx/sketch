<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Helpers\Helper;

class TrimSpaces extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clearsystem:trimspaces';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove extra spaces in each chapter';

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
        $number = Post::latest()->first()->id;
        echo $number.'-';
        $count = 0;
        for($x = 1; $x <= $number; $x++){
            $post = Post::find($x);
            if ($post){
                if ($post->body !== Helper::trimSpaces($post->body)){
                    $post->body = Helper::trimSpaces($post->body);
                    $post->save();
                    $count++;
                }
            }
        }
        echo $count;
    }
}
