<?php

namespace App\Console\Commands;

use Countdown\GenDic;
use Illuminate\Console\Command;

class GenerateWords extends Command
{
    protected $signature = 'words:generate';
    protected $description = 'Generate word list';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        mkdir(__DIR__.'/../../../vendor/codeeverything/countdown-solver/src/data/');
        GenDic::generate();
        return true;
    }
}
