<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Index</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Ingreso de usuario</h1>
            </div>
            <?php if($errors->any()): ?>
            <div class="col-8 mx-auto mt-2 mb-2">
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    - <?php echo e($error); ?> <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-8 mx-auto mt-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="<?php echo e(route('user.store')); ?>" method="POST">
                            <div class="form-row">
                                <div class="col-12">
                                    <input type="text" name="name" class="form-control m-2 p-2" placeholder="Ingresa el nombre del usuario" value="<?php echo e(old('name')); ?>">
                                </div>
                                <div class="col-12">
                                    <input type="email" name="email" class="form-control m-2 p-2" placeholder="Ingresa el correo del usuario" value="<?php echo e(old('email')); ?>">
                                </div>
                                <div class="col-12">
                                    <input type="password" name="password" class="form-control m-2 p-2" placeholder="Ingresa la contraseña">
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-block btn-success">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8 mx-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <form action="<?php echo e(route('user.destroy', $user)); ?>" method="POST">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <input 
                                        type="submit" 
                                        value="Eliminar" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm(`¿Desea eliminar el usuario <?php echo e($user->name); ?>`)"
                                    >
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\Proyectos\laravel-for-levels\laravel-app\resources\views/users/index.blade.php ENDPATH**/ ?>