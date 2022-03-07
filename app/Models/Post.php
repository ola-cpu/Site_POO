<?php

namespace App\Models;

use DateTime;

class Post extends Model{

protected $table = 'posts';


public function getCreatedAt(): string
{

 return (new DateTime($this->created_at))->format('d/m/y a H:i') ;
   
}

public function getExcerpt(): string
{

 return substr($this->content, 0, 210) . '...';
}

public function getButton(): string
{

    return  <<<HTML
        <a href="/posts/$this->id " class="btn btn-primary">Lire l'article</a>
HTML;

}


public function getTags()
{

    return $this->query("
    SELECT t.* FROM tags t 
    INNER JOIN posts_tag pt ON pt.tags_id = t.id
   
    WHERE pt.posts_id = ? 

    ", [$this->id]);

}

public function create(array $data, ?array $relations = null)
{
    parent::create($data);


    $id = $this->db->getPDO()->lastInsertId();

    foreach ($relations as $tagId) {

        $stmt= $this->db->getPDO()->prepare("INSERT posts_tag (posts_id, tags_id) VALUES(?, ?)");
          
        $stmt->execute([$id , $tagId]);
      }
  

      return true;
}



public function update(int $id, array $data, ?array $relations = null)
{
    parent::update($id, $data);

    $stmt = $this->db->getPDO()->prepare("DELETE FROM posts_tag WHERE posts_id = ?");
     $result = $stmt->execute([$id]);

    foreach ($relations as $tagId) {

      $stmt= $this->db->getPDO()->prepare("INSERT posts_tag (posts_id, tags_id) VALUES(?, ?)");
        
      $stmt->execute([$id , $tagId]);
    }

    if ($result) {
        return true;
    }


    }

}