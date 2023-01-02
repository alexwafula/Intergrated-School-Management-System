<?php $__env->startSection('content'); ?>
    <div class="create">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Attendance</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="<?php echo e(route('home')); ?>" class="bg-gray-700 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>

        <div class="w-full mt-8 bg-white rounded">
            <form action="<?php echo e(route('attendance.index')); ?>" method="GET" class="md:flex md:items-center md:justify-between px-6 py-6 pb-0">
                <div class="md:flex md:items-center mb-6 text-gray-700 uppercase font-bold">
                    <div>
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Report:
                        </label>
                    </div>
                    <div class="flex flex-row items-center bg-gray-200 px-4 py-3 rounded">
                        <label class="block text-gray-600 font-bold">
                            <input name="type" class="mr-2 leading-tight" type="radio" value="class" checked>
                            <span class="text-sm">Class</span>
                        </label>
                        <!-- <label class="ml-4 block text-gray-600 font-bold">
                            <input name="type" class="mr-2 leading-tight" type="radio" value="teacher" disabled>
                            <span class="text-sm">Teacher</span>
                        </label> -->
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6 text-gray-700 uppercase font-bold">
                    <div>
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Month
                        </label>
                    </div>
                    <div class="block text-gray-600 font-bold">
                        <div class="relative">
                            <select name="month" class="block font-bold appearance-none w-full bg-gray-200 border border-gray-200 text-gray-600 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">--Select Month--</option>
                                <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($month); ?>"><?php echo e($month); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6 text-gray-700 uppercase font-bold">
                    <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Generate</button>
                </div>
            </form>

            <div class="w-full px-6 py-6">
                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classid => $datevalues): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h2 class="bg-gray-600 text-white font-semibold uppercase px-4 py-3">
                        class <?php echo e($classid); ?>

                    </h2>
                    <div class="flex flex-col bg-gray-200 mb-6">
                        <?php $__currentLoopData = $datevalues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attendancevals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-left text-gray-600 py-2 px-4 font-semibold">
                                <span ><?php echo e($key); ?></span>
                                <div class="flex flex-col justify-between bg-gray-100">
                                    <?php $__currentLoopData = $attendancevals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vals => $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flex flex-row justify-between w-64">
                                            <div class="text-sm text-left text-gray-600 py-2 px-4 font-semibold"><?php echo e($attendance->student->user->name); ?></div>
                                            <div class="text-sm text-left text-gray-600 py-2 px-4 font-semibold">
                                                <?php if($attendance->attendence_status): ?>
                                                    <span class="text-xs text-white bg-green-500 px-2 py-1 rounded">P</span>
                                                <?php else: ?>
                                                    <span class="text-xs text-white bg-red-500 px-2 py-1 rounded">A</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>   
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\CollegeManagementSystem-Laravel\resources\views/backend/attendance/index.blade.php ENDPATH**/ ?>