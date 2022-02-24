<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> <?= lang('App.add') ?> </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <span style="color: red;"><?= session()->getFlashdata('error') ?></span>
                <span style="color: red;"><?= service('validation')->listErrors() ?></span>

                <form action="javascript:void(0)" id="add-category-form" method="post">
                    <?= csrf_field() ?>

                    <?php $i = 1 ?>
                    <div class="col-12">
                        <div class="form-group col-6">
                            <label> <?= lang('App.category_name') ?> </label>
                            <input type="text" name="name" id="name" class="form-control" value="<?= set_value('name') ?>" placeholder="<?= lang('App.category_name') ?>">
                        </div>
                        <div class="form-group col-6">
                            <label> <?= lang('App.parent_category') ?> </label>
                            <select class="form-control parent" name="categories" id="categories-<?= $i ?>" onclick="addDiv(<?= $i ?>)">
                                <option value="0"> - </option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['id'] ?>"> <?= $category['name'] ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-12" id="more-categories-<?= $i ?>"></div>
                    <?php $i++ ?>

                    <button type="submit" class="btn btn-primary" onclick="addCategory();"> <?= lang('App.save') ?> </button>

                    <a type="button" href="<?= base_url('/categories') ?>" class="btn btn-danger">
                        <?= lang('App.back') ?>
                    </a>
                </form>

                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->

</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>

<?= script_tag('js/custom/categories.js') ?>

<?= $this->endSection() ?>