
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  
    <title><?php echo $__env->yieldContent('title'); ?></title>


    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/dashboard.css')); ?>" rel="stylesheet">
  </head>

  <body>
    <!-- Head from dashboard -->
	<?php echo $__env->make('dashboard.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid">
      <div class="row">
        <!-- nav from dashboard -->
         <?php echo $__env->make('dashboard.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
         <?php echo $__env->yieldContent('content'); ?>
        </main>
      </div>
    </div>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo e(asset('js/jquery-3.3.1.slim.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
  </body>
</html>
<?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/default.blade.php ENDPATH**/ ?>