<style>
    .nav-pills>li.active>a {
        font-weight: 600;
        color:#D65F0F;
    }
</style>
<ul class="nav nav-pills nav-stacked">
    <li class="<?php if(request()->segment(count(request()->segments())) == 'SupportDepartment'): ?>active <?php endif; ?>"><a href="<?php echo e(url('SupportDepartment')); ?>"><i class="fa fa-home"></i> الرئيسية </a></li>
    <li class="<?php if(request()->segment(count(request()->segments())) == 'app_package_data'): ?>active <?php endif; ?>"><a href="<?php echo e(url('app_package_data')); ?>" ><i class="fa fa-cubes"></i> الباقات</a></li>
    <li class="<?php if(request()->segment(count(request()->segments())) == 'app_services_data'): ?>active <?php endif; ?>"><a href="<?php echo e(url('app_services_data')); ?>"><i class="fa fa-id-card"></i> الخدمات الهندسية والتجارية</a></li>
    <li class="<?php if(request()->segment(count(request()->segments())) == 'app_offers_data'): ?>active <?php endif; ?>"><a href="<?php echo e(url('app_offers_data')); ?>"><i class="fa fa-percentage"></i> العروض والتخفيضات </a></li>
    <li class="<?php if(request()->segment(count(request()->segments())) == 'app_gallery_data'): ?>active <?php endif; ?>"><a href="<?php echo e(url('app_gallery_data')); ?>"><i class="fa fa-star-of-life"></i> معرض الصور</a></li>
    <li class="<?php if(request()->segment(count(request()->segments())) == 'app_upgrade_requests_data'): ?>active <?php endif; ?>"><a href="<?php echo e(url('app_upgrade_requests_data')); ?>"><i class="fab fa-first-order-alt"></i> طلبات العملاء لتطوير الباقات</a></li>
</ul>
<?php /**PATH /Applications/MAMP/htdocs/skyapp/resources/views/SUPPORT/sub_aside.blade.php ENDPATH**/ ?>