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

                <form action="<?= base_url('/categories') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="col-md-6">
                        <div class="form-group col-md-6">
                            <label> <?= lang('App.category_name') ?> </label>
                            <input type="text" name="name" class="form-control" value="<?= set_value('name') ?>" placeholder="<?= lang('App.category_name') ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label> <?= lang('App.parent_category') ?> </label>
                            <select name="parent_id" id="parent" class="form-control">
                                <option value="0"> - </option>
                                <?php foreach ($parentCategories as $parent) : ?>
                                    <option value="<?= $parent['id'] ?>"> <?= $parent['name'] ?> </option>
                                    <?php foreach ($subCategories as $sub) : ?>
                                        <?php if ($parent['id'] == $sub['parent_id']) : ?>
                                            <option class="sub" value="<?= $sub['id'] ?>"> -- <?= $sub['name'] ?> </option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                                <!-- set_select('categories', $category) -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary"> <?= lang('App.save') ?> </button>
                        <a type="button" href="<?= base_url('/categories') ?>" class="btn btn-danger">
                            <?= lang('App.back') ?>
                        </a>
                    </div>
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