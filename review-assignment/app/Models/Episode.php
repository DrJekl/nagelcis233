<?php

namespace app\Models;

class Episode {
    function __construct(
        public $name,
        public $image,
        public $season,
        public $episode,
        public $summary
    )
    {
    }
  
}