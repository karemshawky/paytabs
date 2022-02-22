<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-2 text-gray-800"> <?= lang('App.categories') ?> </h1>
    </div>
    <div class="col-md-6">
        <a href="#" style="float:left" class="btn btn-primary btn-icon-split">
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
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead style="background-color: #f0956e">
                    <tr style="color: #fff">
                        <th>{{ __('locale.id') }}</th>
                        <th>{{ __('locale.name') }}</th>
                        <th>{{ __('locale.image') }}</th>
                        <th>{{ __('locale.process') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        {{-- <td>@if($category->parent_id == 0) {{__('locale.main_category')}} @else
                        {{$category->parent->name}} @endif</td> --}}
                        <td><img src="{{ $category->image }}" style="height:35px; width:50px" /></td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-circle" data-toggle="tooltip" data-placement="top" title="{{ __('locale.edit') }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="{{ __('locale.delete') }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $categories->links() !!}
            </div>
        </div>
    </div>
</div>
</h1>

<?= $this->endSection() ?>