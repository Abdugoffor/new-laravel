<div class="row">
    <div class="col-6 offset-3">
        <h1 class="mt-2">Register Page</h1>
        <form action="/register" method="post">
            <div class="mb-3">
                <label for="text" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="text">
                <span class="text-info"><?= isset($errors['name']) ? $errors['name'] : ''?></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email">
                <span class="text-info"><?= isset($errors['email']) ? $errors['email'] : ''?></span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <span class="text-info"><?= isset($errors['password']) ? $errors['password'] : ''?></span>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>
