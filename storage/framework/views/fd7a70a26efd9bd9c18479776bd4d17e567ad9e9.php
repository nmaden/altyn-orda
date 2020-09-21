<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!--Добавляем класс active для активного пункта меню-->
    <li <?php echo e((URL::current() == $item->url()) ? "class=active" : ''); ?>>
        <!-- метод url() получает ссылку на пункт меню (указана вторым параметром
        при создании объекта LavMenu)-->
        <a href="<?php echo e($item->url()); ?>"><?php echo e($item->title); ?></a>
        <!--Формируем дочерние пункты меню
        метод haschildren() проверяет наличие дочерних пунктов меню-->
        <?php if($item->hasChildren()): ?>
            <ul class="sub-menu">
                <!--метод children() возвращает дочерние пункты меню для текущего пункта-->
                <?php echo $__env->make(env('THEME').'.customMenuItems', ['items'=>$item->children()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        <?php endif; ?>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php /**PATH /home/vagrant/code/orda/resources/views/orda/navigate-item.blade.php ENDPATH**/ ?>