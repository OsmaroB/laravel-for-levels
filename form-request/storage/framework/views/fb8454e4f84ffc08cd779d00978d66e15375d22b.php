<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <h2 class="text-center">
                        Formulario de envio
                    </h2>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(route('post.store')); ?>" method="POST">
                                <div class="form-row">
                                    <div class="col-12">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <div class="row m-2">
                                            <?php echo csrf_field(); ?>
                                            <input type="submit" value="enviar" class="btn btn-block btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Proyectos\laravel-for-levels\form-request\resources\views/welcome.blade.php ENDPATH**/ ?>