<?php if (isset($_SESSION['success_msg'])): ?>
    <script>
        iziToast.success({
            message: "<?=$_SESSION['success_msg']?>",
            position: 'topRight'
        });
    </script>
<?php endif; ?>

<?php if (isset($_SESSION['error_msg'])): ?>
    <script>
        iziToast.error({
            message: "<?=$_SESSION['error_msg']?>",
            position: 'topRight'
        });
    </script>
<?php endif; ?>

<?php if (isset($_SESSION['info_msg'])): ?>
    <script>
        iziToast.info({
            message: "<?=$_SESSION['info_msg']?>",
            position: 'topRight'
        });
    </script>
<?php endif; ?>


<?php if (isset($_SESSION['alert_msg'])): ?>
    <script>
        iziToast.alert({
            message: "<?=$_SESSION['alert_msg']?>",
            position: 'topRight'
        });
    </script>
<?php endif; ?>


<?php
session_reset();
session_destroy();
?>
