<h1><?= $params['post']->title ?></h1>
            <div>
                <?php foreach($params['post']->getTags()  as $tag): ?>

                    <span class="badge  badge-info"><?= $tag->name ?></span>
                    <?php endforeach ?>
                
                
            </div>
<p><?= $params['post']->content ?></p>




<a href="/posts" class="btn btn-secondary">Retour en arriére</a>