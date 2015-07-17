<?php

class Poster extends Eloquent{

        protected $table = 'posters';

        protected $fillable = array(
                    'image',
                    'created_at'
            );        
}