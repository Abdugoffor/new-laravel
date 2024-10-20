<center>
    <h1><?php echo htmlspecialchars($title); ?></h1>

    <?php if (!empty($errors)): ?>
        <div style="color: green;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><b><?php echo htmlspecialchars($error); ?></b></li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>

    <form action="/create" method="post">
        <input type="text" name="name" placeholder="Name" value="<?php echo htmlspecialchars($data['name'] ?? ''); ?>"> <br><br>
        <input type="text" name="email" placeholder="Email" value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>"> <br><br>
        <input type="password" name="password" placeholder="Password"> <br><br>
        <input type="submit" name="ok">
    </form>
</center>
