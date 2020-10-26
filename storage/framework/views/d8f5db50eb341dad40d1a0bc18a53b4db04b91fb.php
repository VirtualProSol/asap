<?php $__env->startSection('content'); ?>
        <TABLE CLASS="hdft" WIDTH="100%" CELLSPACING="0">
            <TR>
                <TH CLASS="tl">Daily Vehicles Registered Report (generated <?php echo e(date('D d M Y H:i:s',time())); ?>)</TH>
            </TR>
            <TR>
                <TD CLASS="nv">[<A HREF="#"></A>]</TD>
            </TR>
        </TABLE>
    
        <H3>OVERALL STATS SUMMARY</H3>
        <TABLE CLASS="it" CELLSPACING="0">
            <TR>
                <TD>total registered:</TD>
                <TD><?php echo e(count($vehicles)); ?></TD>
            </TR>
            
            <TR>
                <TD>different locations registered:</TD>
                <TD>3</TD>
            </TR>
            <TR>
                <TD>total registered in Harare:</TD>
            <TD><?php echo e($harare); ?></TD>
            </TR>
            <TR>
                <TD>total registered in Bulawayo:</TD>
            <TD><?php echo e($bulawayo); ?></TD>
            </TR>
            <TR>
                <TD>total registered in Other locations:</TD>
            <TD><?php echo e($others); ?></TD>
            </TR>
        </TABLE>
        <H3>DETAILED LIST</H3>
        <TABLE WIDTH="100%" CELLSPACING="0">
            <TR>
                <TH CLASS="f">Vehicle Registration Number</TH>
                <TH>Brand</TH>
                <TH>Model</TH>
                <TH>Supplier Name</TH>
                <TH>Location</TH>
            </TR>
            <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <TR CLASS="o">
                <TD><A HREF="#"><?php echo e($vehicle->vehicle_reg); ?></A></TD>
                <TD CLASS="h"><?php echo e($vehicle->brand); ?></TD>
                <TD CLASS="h"><?php echo e($vehicle->model); ?></TD>
                <TD CLASS="h"><?php echo e($vehicle->supplier); ?></TD>
                <TD CLASS="h"><?php echo e($vehicle->location); ?></TD>
                </TR>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </TABLE>
        <P></P>
        <TABLE CLASS="hdft" WIDTH="100%" CELLSPACING="0">
            <TR>
                <TD CLASS="nv">[<A HREF="#">all classes</A>]</TD>
            </TR>
            <TR>
                <TD CLASS="tl"><A HREF="#">ASAP Group Cars 1.1.0 (stable)</A> (C) Taurainesu Solutions</TD>
            </TR>
        </TABLE>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('reports.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nya/Downloads/Compressed/copy-car-rental-master/resources/views/reports/dailyRegistered.blade.php ENDPATH**/ ?>