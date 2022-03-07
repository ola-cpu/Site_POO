<?php

namespace App\Models;



class Tag extends Model{

protected $table = 'tags';



public function getPosts()

{

   return $this->query("
   SELECT p.* FROM posts p
   INNER JOIN posts_tag pt ON pt.posts_id = p.id
   where pt.tags_id = ?
   ",[$this->id]); 
}




}