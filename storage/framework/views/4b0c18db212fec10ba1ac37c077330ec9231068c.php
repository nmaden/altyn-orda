
    <header>
        <div class="container">
            <div class="header__row">
                <div class="header__logo">
                    <a href="/<?php echo e(app()->getLocale()); ?>">
                        <img src="/img/logo.svg" alt="">
                    </a>
                </div>
                <div class="header__right">
                   <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                   <?php if(PageService::page_calc(['calendars','sights','routes','gids','figures'])): ?>
                    <div class="header__serch">
                        <form role="search" 
						method="get" id="searchform" class="searchform" 
						action="<?php echo e(route(PageService::page_name())); ?>" style="right: -10px; width: 0px;">
                            <input type="text" value="<?php echo e(isset($request->s) ? $request->s : ''); ?>" placeholder="Поиск" name="s" id="autosearch" >
							<!--<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">--->

                            <button type="submit">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#0e4f32"></path>
                                    <path d="M21 21L16.65 16.65" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#0e4f32"></path>
                                </svg>
                            </button>
                        </form>
                        <a href="/" class="header__serch--click">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M21 21L16.65 16.65" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>
                  <?php endif; ?>
                    <!-- 1-->
                    <div class="header__lang">
                        <ul class="lang__menu">
                          <li><a class='current' href="#">
                          <?php echo e($q_lang->get() ? $q_lang->get() : 'ru'); ?>

                          </a>
                              <ul class="lang__menu--children">
                              <?php $__currentLoopData = $q_lang->getAr(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a id="<?php echo e($k); ?>" href="/<?php echo e($k); ?>/change_lang"><?php echo e($v); ?></a></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                          </li>
                      </ul>
                  </div>
                    <div class="header__social">
					<?php
					//dd($social)
					?>
					<?php if(is_array($social)): ?>
                      <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        
						<?php if(isset($v[app()->getLocale()])): ?>
					   <div class="header__social--item tooltip__item" title="<?php echo e($v[app()->getLocale()]['hint']); ?>">
                            <a href="<?php echo e($v[app()->getLocale()]['name']); ?>">
                                <img src="<?php echo e(URL::asset($v[app()->getLocale()]['photo'])); ?>" alt="">
                            </a>
						</div>

						<?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>
                    </div>
                    <div class="header__user tooltip__item" title="текст">
                        <a href="<?php echo e(route('vhod')); ?>">
                            <img src="/img/icon-user.svg" alt="">
                        </a>
                    </div>
                    <div class="header__menu">
                        <div class="header__menu--burger header__menu--click">
                            <div class="burger--left">
                                Меню
                            </div>
                            <div class="burger--right">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <div class="header__menu--container">
        <div class="container">
            <div class="header__menu--row">
                <div class="header__menu--li">
                    <?php echo $__env->make('orda'.'.navigatitem',['items'=>$menu->roots()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="header__menu--close header__menu--click">
                    <div class="burger--right">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div><?php /**PATH /home/vagrant/code/orda/resources/views/orda/navigation.blade.php ENDPATH**/ ?>