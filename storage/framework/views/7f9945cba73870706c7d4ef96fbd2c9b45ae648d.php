<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="list-group">
                                    <a class="list-group-item <?php if(\Request::route()->getName()=='admin'): ?> active <?php endif; ?>" href="/admin/">Overview</a>
                                    <a class="list-group-item active" href="/admin/manage-user/">Manage User</a>
                                    <a class="list-group-item <?php if(\Request::route()->getName()=='admin/membership-plan'): ?> active <?php endif; ?>" href="/admin/membership-plan">Membership Plan</a>
                                    <a class="list-group-item <?php if(\Request::route()->getName()=='admin/free-sign-up'): ?> active <?php endif; ?>" href="/admin/free-sign-up">Free Sign Up</a>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3>Add User</h3>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>