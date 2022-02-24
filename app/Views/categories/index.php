<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-2 text-gray-800"> <?= lang('App.categories') ?> </h1>
    </div>
    <div class="col-md-6">
        <a href="<?= base_url('/categories/new') ?>" style="float:left" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-highlighter"></i>
            </span>
            <span class="text"> <?= lang('App.add') ?> </span>
        </a>
    </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <?= lang('App.categories') ?> </h6>
    </div>
    <!-- <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead style="background-color: #f0956e">
                    <tr style="color: #fff">
                        <th> <?= lang('App.id') ?> </th>
                        <th> <?= lang('App.category_name') ?> </th>
                        <th> <?= lang('App.parent_category') ?> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> {{ $category->id }}</td>
                        <td> {{ $category->name }}</td>
                        <td> <img src="{{ $category->image }}" style="height:35px; width:50px" /> </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div> -->
</div>
</h1>

<?= $this->endSection() ?>