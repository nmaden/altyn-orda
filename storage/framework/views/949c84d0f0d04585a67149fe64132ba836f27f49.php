
    

    <div class="register__page--body">
        <div class="container">

            <div class="register__body--absol">
                <h1 class="register__body--title">
                    Вход
                </h1>
                <div class="register__body--form">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('check_login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="register__form--item-block">
                            <div class="register__form--item">
                                <div class="form__item--input <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <input id="email" type="email" placeholder="E-mail" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="register__form--item">
                                <div class="form__item--input <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <input id="password" type="password" placeholder="Пароль (мин 6 символов)" class="form-control" name="password" required>
                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="register__form--submit">
                            <div class="form__item--passtext">
                                <a href="<?php echo e(route('password.request')); ?>" class="passtext">
                                    Забыли пароль?
                                </a>
                            </div>
                            <div class="form__item--submit">
                                <button type="submit" class="form__submit">
                                    Войти
                                </button>
                                <div class="form__item--submit-linck">
                                    <a href="<?php echo e(route('registration')); ?>" class="form__item--linck">
                                        Регистрация
                                    </a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            

        </div>
    </div>

<?php /**PATH /home/vagrant/code/orda/resources/views/orda/user/login.blade.php ENDPATH**/ ?>