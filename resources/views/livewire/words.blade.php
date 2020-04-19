<div>
    <div class="uk-panel uk-background-muted uk-padding-small uk-margin-top">
        <div class="uk-flex uk-flex-center">
            @foreach($letters as $letter)
                <div class="uk-card uk-card-body uk-card-small uk-card-primary uk-width-small uk-margin-small-right">
                    <div class="uk-text-center">{{ $letter }}</div>
                </div>
            @endforeach
            @for ($i = 1; $i <= 9 - count($letters); $i++)
                <div class="uk-card uk-card-body uk-card-small uk-card-default uk-width-small uk-margin-small-right">
                    <div class="uk-text-center">&nbsp;</div>
                </div>
            @endfor
        </div>
    </div>
    <hr>
    <div class="uk-grid uk-flex-middle" data-uk-grid>
        @if (count($letters) !== 9)
            <div class="uk-width-auto@s uk-width-1-2">
                <button class="uk-button uk-button-primary uk-button-large uk-width-1-1"
                        wire:click="vowel">
                    Vowel
                </button>
            </div>
            <div class="uk-width-auto@s uk-width-1-2">
                <button class="uk-button uk-button-primary uk-button-large uk-width-1-1"
                        wire:click="consonant">
                    Consonant
                </button>
            </div>
            <div class="uk-width-expand@s uk-visible@s"></div>
        @else
            <div class="uk-width-auto@s">
                <button class="uk-button uk-button-secondary uk-button-large uk-width-1-1"
                        onclick="start_countdown()">
                    Start the Clock!
                </button>
            </div>
            <div class="uk-width-auto">
                <p id="counting">30</p>
            </div>
            <div class="uk-width-expand">
                <progress class="uk-progress" value="0" max="30" id="pbar"></progress>
            </div>
            <div class="uk-width-auto@s">
                <button class="uk-button uk-button-primary uk-button-large uk-width-1-1"
                        wire:click="solve">
                    Solve
                </button>
            </div>
        @endif
        <div class="uk-width-auto@s uk-visible@m">
            <a href="/" class="uk-button uk-button-large uk-button-secondary uk-width-1-1">
                New Game
            </a>
        </div>
    </div>

    <p class="uk-hidden@m">
        <a href="/" class="uk-button uk-button-large uk-button-secondary uk-width-1-1">
            New Game
        </a>
    </p>
    @if ($solutions)
        <p class="uk-text-center uk-text-large">
            @foreach($solutions as $solution)
                <span class="uk-label uk-label-success uk-text-large">{{ $solution }} ({{ strlen($solution) }})</span>
            @endforeach
        </p>
    @endif
    <script type="text/javascript">
        function start_countdown() {
            document.getElementById("music").play();
            let reverse_counter = 30;
            let downloadTimer = setInterval(function () {
                document.getElementById("pbar").value = 30 - --reverse_counter;
                if (reverse_counter <= 0) {
                    clearInterval(downloadTimer);
                }
                document.getElementById("counting").innerHTML = reverse_counter;
            }, 1000);
        }
    </script>
    <audio id="music">
        <source src="/mp3/c4.mp3" type="audio/mpeg">
    </audio>
</div>
