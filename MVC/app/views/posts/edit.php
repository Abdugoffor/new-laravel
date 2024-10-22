<!-- Button trigger modal -->
<button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#editModel<?=$post->id?>">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="editModel<?=$post->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/post-update" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?=$post->id?>">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" value="<?=$post->title?>" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <input type="text" name="description" value="<?=$post->description?>" class="form-control" id="Description">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Img</label>
                        <input type="file" name="img" class="form-control" id="img">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Text</label>
                        <textarea class="form-control" id="text" name="text" rows="3"><?=$post->text?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
