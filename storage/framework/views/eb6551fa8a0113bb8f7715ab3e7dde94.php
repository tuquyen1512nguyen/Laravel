
<?php $__env->startSection('admin_content'); ?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật thương hiệu sản phẩm
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            <?php $__currentLoopData = $edit_brand_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edit_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="position-center">
                                <form role="form" action="<?php echo e(URL::to('/update-brand-product/'.$edit_value->brand_id)); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="<?php echo e($edit_value->brand_name); ?>" name="brand_product_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" value="<?php echo e($edit_value->brand_slug); ?>" name="brand_product_slug" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" id="exampleInputPassword1" ><?php echo e($edit_value->brand_desc); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="brand_product_status" class="form-control input-sm m-bot15">
                                             <?php if($edit_value->brand_status==1): ?>
                                            <option selected value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                             <?php else: ?>
                                            <option value="1">Hiển thị</option>
                                            <option selected value="0">Ẩn</option>
                                            <?php endif; ?>
                                                                                     
                                    </select>
                                </div>
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật thương hiệu</button>
                                </form>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                           
                        </div>
                    </section>

            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mylaravel\resources\views/admin/edit_brand_product.blade.php ENDPATH**/ ?>