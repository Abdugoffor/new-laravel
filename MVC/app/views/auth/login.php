<div class="row">
    <div class="col-6 offset-3">
        <h1 class="mt-2">Login Page</h1>
        <form action="/login" method="post">
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
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
