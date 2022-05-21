<script src="<?php echo e(asset('code/highcharts.js')); ?>"></script>
<script src="<?php echo e(asset('code/modules/exporting.js')); ?>"></script>
<script src="<?php echo e(asset('code/modules/export-data.js')); ?>"></script>
<?php
$pro = \App\Models\ActivateFile::count();
$aproval = \App\Models\Documents::where('mission','!=',null)->count();
$eng = \App\Models\User::where('roll','AdmissionEmp')->count();
$noti = DB::table('app_notification')->count();
$filecount_by_eng = \App\Models\User::where('roll','AdmissionEmp')->where('id','!=',25)->where('id','!=',28)->get();
?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <h3>
            لوحة التحكم
            <small>الرئيسية</small>

        </h3>

        <ol class="breadcrumb" style="">
            <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="<?php echo e(url('/')); ?>"><i class="fa fa-folder-open"></i>  لوحة التحكم </a></li>

        </ol>
    </div>
    <div class="" style="margin-left: 0px !important;">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-project-diagram" style="margin-top: 20px"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><a href="<?php echo e(url('ProjectsSummary')); ?>" id="" >المشاريع</a></span>
                    <span class="info-box-number"><?php echo e($pro); ?><small> مشروع</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-hard-hat" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"> <a href="#"  data-toggle="modal" data-target="#Modal">الملفات</a> </span>
                    <span class="info-box-number"><?php echo e($aproval); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-user-friends" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="<?php echo e(url('engineers')); ?>" >المهندسين</a></span>
                    <span class="info-box-number"><?php echo e($eng); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-chart-line" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="<?php echo e(url('AllNotifications')); ?>" >التنبيهات</a> </span>
                    <span class="info-box-number"><?php echo e($noti); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>



    <div class="row" id="prosummary">

        <div class="col-lg-4">
        <?php
            $allJobCards = \App\Models\Tasks::count();
            $doneJobCards = \App\Models\Tasks::where('TaskDone','yes')->count();
            $notDoneJobCards = \App\Models\Tasks::where('TaskDone','no')->count();
            $reject_accept = \App\Models\Documents::where('reject_accept','2')->count();
            $allFiles = \App\Models\Documents::where('mission','!=',null)->count();
        ?>

                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">جميع المهام</span>
                        <span class="info-box-number"><?php echo e($allJobCards); ?></span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                    <?php echo e($allJobCards); ?> All Opened Job Cards
                  </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">المهام المنجزة</span>
                        <span class="info-box-number"><?php echo e($doneJobCards); ?></span>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo e($doneJobCards * $allJobCards / 100); ?>%"></div>
                        </div>
                        <span class="progress-description">
                   <?php echo e(number_format((float) $doneJobCards / $allJobCards * 100, 2, '.', '')); ?>% من المهام منجزة
                  </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">المهام الغير منجزة</span>
                        <span class="info-box-number"><?php echo e($notDoneJobCards); ?></span>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo e($notDoneJobCards * $allJobCards / 100); ?>%"></div>
                        </div>
                        <span class="progress-description">
                    <?php echo e(number_format((float)$notDoneJobCards / $allJobCards * 100, 2, '.', '')); ?> % من المهام غير منجزة
                  </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">الاعتمادات</span>
                        <span class="info-box-number"><?php echo e($reject_accept); ?></span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
                        <span class="progress-description">
                    <?php echo e(number_format((float)$reject_accept / $allFiles * 100, 2, '.', '')); ?>% من اجمالي الاعمادات المطلوبة
                  </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->


      
        </div>

        <div class="col-lg-8">

            <div id="char2" style="min-width: 310px; height: 450px; max-width: 100%; margin: 0 auto;font-size: 12px;"></div>
            <script type="text/javascript">
                Highcharts.chart('char2', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'ملخص اداء المهندسين'
                    },
                    subtitle: {
                        text: 'حسب المهام والملفات المرفوعة'
                    },
                    xAxis: {
                        categories: [
                            <?php $__currentLoopData = $filecount_by_eng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<?php echo e($item->name); ?>',
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'ملخص المهام'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'الملفات',
                        data: [
                                <?php $__currentLoopData = $filecount_by_eng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $coen = \App\Models\Documents::where('Usr_id',$item->id)->count();
                                ?>
                            {
                                name: '<?php echo e($item->name); ?>',
                                y: <?php echo e($coen); ?>

                            },
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ]

                    },
                        {
                            name: 'الغير منجزة',
                            data: [
                                    <?php $__currentLoopData = $filecount_by_eng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $dontask = \App\Models\Tasks::where('EmpID',$item->id)->where('TaskDone','no')->count();
                                    ?>
                                {
                                    name: '<?php echo e($item->name); ?>',
                                    y: <?php echo e($dontask); ?>

                                },
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            ]

                        },
                        {
                        name: 'المهام المنجزة',
                        data: [
                                <?php $__currentLoopData = $filecount_by_eng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $dontask = \App\Models\Tasks::where('EmpID',$item->id)->where('TaskDone','yes')->count();
                                ?>
                            {
                                name: '<?php echo e($item->name); ?>',
                                y: <?php echo e($dontask); ?>

                            },
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ]

                    },

                    ]
                });
            </script>
            <script type="text/javascript">
                // Build the chart
                Highcharts.chart('سس', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'column'
                    },
                    title: {
                        text: 'ملفات المهندسين'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage} </b>'
                    },
                     xAxis: {
                        categories: [
                            <?php $__currentLoopData = $filecount_by_eng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    '<?php echo e($item->name); ?>',
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        crosshair: true
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'Files',
                        colorByPoint: true,
                        data: [
                                <?php $__currentLoopData = $filecount_by_eng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $coen = \App\Models\Documents::where('Usr_id',$item->id)->count();
                                ?>
                            {
                                name: '<?php echo e($item->name); ?>',
                                y: <?php echo e($coen); ?>

                            },
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        ]
                    }]
                });
            </script>
        </div>
    </div>

    <div class="clearfix visible-sm-block"></div>

    <div class="modal fade" id="Modal3" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> المهندسين</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">اخر الملفات المرفوعة </h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-responsive example">
                    <thead></thead>
                    <?php $fil = \App\Models\Documents::join('users','users.id','=','documents.Usr_id')
                        ->where('documents.mission','!=',null)
                        ->orderBy('documents.id','desc')
                        ->take(10)
                        ->get();
                    ?>
                    <?php $__currentLoopData = $fil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $cat = '' ;
                        if($item->cat == '1'){
                            $cat = 'مخطط';
                        }elseif($item->cat == '2'){
                            $cat = 'تقرير كميات';
                        }elseif($item->cat == '3'){
                            $cat = 'توصيات';
                        }elseif($item->cat == '4'){
                            $cat = 'اخري';
                        }
                        ?>
                        <?php $fname = \App\Models\ActivateFile::where('Bennar',$item->projectID)->first(); ?>
                        <tr>
                            <td >
                                <a href="javascript::;" class="product-title"><?php echo e($item->mission); ?> </a>
                                <span class="product-description">
                          قام المهندس <a class=""><?php echo e($item->name); ?></a> برفع ملف <?php echo e($cat); ?> <a> </a> للعميل <?php echo e($fname->FileCode); ?>

                          <p></p>
                          <p><a href="<?php echo e(url('storage/app/public')); ?>/<?php echo e($item->Docs); ?>" target="_blank">اضغط للعرض</a></p>
                        </span>
                            </td>
                        </tr><!-- /.item -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
    </div>


    <div class="modal fade" id="general_pop_up" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ملخصات المشاريع</h4>
                </div>
                <div class="modal-body" id="modalBody">


                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/skyapp/resources/views/home.blade.php ENDPATH**/ ?>