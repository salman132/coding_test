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
                                    <form action="" method="GET">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="group_name" id="" class="form-control" placeholder="Group Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="date" class="form-control datepicker" id="datetimepicker" placeholder="Date">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="group_type"  class="form-control">
                                                    <option value="">All Group</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-area" style="padding-top: 20px">
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