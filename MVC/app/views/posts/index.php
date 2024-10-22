<h1 class="mt-2">Posts Page</h1>
<?php
include 'create.php';

if (isset($errors)) {
    foreach ($errors as $error) {?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <?=$error?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php }
}
?>
<table class="table table-bordered table-hover mt-3">
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Description</th>
      <th>Text</th>
      <!-- <th>Img</th> -->
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($models as $post): ?>
    <tr>
      <th><?=$post->id?></th>
      <td><?=$post->title?></td>
      <td><?=$post->description?></td>
      <td><?=$post->text?></td>

      <td>
        <?php
          include 'edit.php';
        ?>
        <form action="/post-delete" method="post">
          <input type="hidden" name="id" value="<?=$post->id?>">
          <button type="submit" class="btn btn-danger me-2 mt-2">Delete</button>
        </form>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
