<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body">

        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">
                           Recent posts moved to buffer
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="custom-search">
                            <div class="col-md-12">
                                <div class="row">


                                        <div id="app">
                                            <example-component></example-component>
                                        </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

    <script>


        $(function () {
            $('#datetimepicker').datetimepicker();
        });

    </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>