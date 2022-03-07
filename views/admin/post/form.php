<h1><?= $params['post']->title ?? 'Créer un nouvel article' ?></h1>

<form action="<?= isset($params['post']) ? "/admin/posts/edit/{$params['post']->id}" :"/admin/posts/create" ?> " method="POST">

<div class="form-group">
<label for="title">Titre de l'atricle </label>

<input type="text " class="form-control" id="title" name="title" value="<?= $params['post']->title ??  '' ?>">


</div>

<div class="form-group">

    <label for="content">Contenu de l'article </label>

<textarea name="content" id="content" rows="8" class="form-control"><?= $params['post']->content ?? '' ?></textarea>

</div>

<div class="form-group">
    <label for="tags">Tag de l'atricle </label>
    <select multiple class="form-control" id="tags" name="tags[]">
      <?php foreach ($params['tags'] as $tag ): ?>
    
        <option value="<?= $tag->id ?>" 
        
        <?php if (isset($params['post'])) : ?> 
          
        <?php foreach($params['post']->getTags() as $posTag)
        {

            echo ($tag->id === $posTag->id) ? 'selected' : '';
        }
        
        ?>
     <?php endif ?>

         ><?= $tag->name ?></option>
        <?php endforeach ?>

    </select>
  </div>

<button type="submit" class="btn btn-primary"><?= isset($params['post']) ? 'Enregistrer 
la modification' : 'Enregistre mon article' ?></button>

</form>
