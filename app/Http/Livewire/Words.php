<?php

namespace App\Http\Livewire;

use Countdown\Countdown;
use Livewire\Component;

class Words extends Component
{
    public $letters = [];

    private $vowelPool = [
        'A' => 15,
        'E' => 21,
        'I' => 13,
        'O' => 13,
        'U' => 5,
    ];

    private $consonantPool = [
        'B' => 2,
        'C' => 3,
        'D' => 6,
        'F' => 2,
        'G' => 3,
        'H' => 2,
        'J' => 1,
        'K' => 1,
        'L' => 5,
        'M' => 4,
        'N' => 8,
        'P' => 4,
        'Q' => 1,
        'R' => 9,
        'S' => 9,
        'T' => 9,
        'V' => 1,
        'W' => 1,
        'X' => 1,
        'Y' => 1,
        'Z' => 1,
    ];

    public $consonants;
    public $vowels;
    public $solutions;

    public function mount(): void
    {
        foreach ($this->consonantPool as $consonant => $frequency) {
            $letters = str_split(str_repeat($consonant, $frequency));
            foreach ($letters as $letter) {
                $this->consonants[] = $letter;
            }
        }
        foreach ($this->vowelPool as $vowel => $frequency) {
            $letters = str_split(str_repeat($vowel, $frequency));
            foreach ($letters as $letter) {
                $this->vowels[] = $letter;
            }
        }
        shuffle($this->vowels);
        shuffle($this->consonants);
    }

    public function vowel()
    {
        $this->letters[] = array_shift($this->vowels);
    }

    public function consonant()
    {
        $this->letters[] = array_shift($this->consonants);
    }

    public function solve()
    {
        // GenDic::generate();
        $solver = new Countdown();

        $this->solutions = array_reverse($solver->solve(implode('', $this->letters), 100));
    }

    public function render()
    {
        return view('livewire.words');
    }
}
