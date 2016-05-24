<div id="tabFiles" role="tabpanel" class="tab-pane margin-top-10">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="attachmentTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>File Name</th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Created By</th>
                    <th>Uploaded At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->attachments as $index => $attachment)
                    @include('order.items.attachment')
                @endforeach
            </tbody>
        </table>
    </div>
    <input type="hidden" id="uploadUrl" value="{{route('upload_attachment', ['orderId' => $order->id])}}" />
    <input type="file" name="attachment" id="attachment" style="float: left; margin-left: 10px;" />
    <button class="btn btn-primary" id="btnUploadAttachment" class="btnUploadAttachment">Upload</button>
</div>