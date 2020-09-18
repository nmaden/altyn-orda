<?php if(Session::has('sweet_alert.alert')): ?>
    <script>
        <?php if(Session::has('sweet_alert.content')): ?>
            var config = <?php echo Session::pull('sweet_alert.alert'); ?>

            var content = document.createElement('div');
            content.insertAdjacentHTML('afterbegin', config.content);
            config.content = content;
            swal(config);
        <?php else: ?>
            swal(<?php echo Session::pull('sweet_alert.alert'); ?>);
        <?php endif; ?>
    </script>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <script>
        swal({
            text: "<?php echo Session::get('error'); ?>",
            icon: "error",
            buttons: false,
        });
    </script>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <script>
        swal({
            text: "<?php echo Session::get('success'); ?>",
            icon: "success",
            buttons: false,
        });
    </script>
<?php endif; ?>

<?php if(Session::has('info')): ?>
    <script>
        swal({
            text: "<?php echo Session::get('info'); ?>",
            icon: "info",
            buttons: false,
        });
    </script>
<?php endif; ?>

<?php if(Session::has('warning')): ?>
    <script>
        swal({
            text: "<?php echo Session::get('warning'); ?>",
            icon: "warning",
            buttons: false,
        });
    </script>
<?php endif; ?>


<?php /**PATH /home/vagrant/code/orda/resources/views/vendor/sweet/alert.blade.php ENDPATH**/ ?>