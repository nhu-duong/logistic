<div id="tabContainers" role="tabpanel" class="tab-pane margin-top-10">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Container No.</th>
                    <th>Seal No.</th>
                    <th>Type</th>
                    <th>Packages</th>
                    <th>Weight</th>
                    <th>Volume</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="table_container_body">
            @if (!empty($containers))
                @foreach ($containers as $cont)
                    @include('order.items.container')
                @endforeach
            @else
                {{$order->containers()->count()}}
            @endif
            </tbody>
        </table>
        <a class="btn btn-primary showCreateForm" href="javascript:void(0);" data-create-form-url="{{route('new_container_ajax', ['orderId' => $order->id])}}">New</a>
    </div>
</div>