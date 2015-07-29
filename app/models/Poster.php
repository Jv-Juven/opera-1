<?php

class Poster extends Eloquent{

        protected $table = 'posters';

        protected $fillable = array(
                    'image',
                    'link',
                    'created_at'
            );        
}