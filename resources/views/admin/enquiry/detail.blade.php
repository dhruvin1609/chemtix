<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" value="{{ $enquiry->name }}" class="form-control" disabled aria-describedby="helpId" placeholder="" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="text" value="{{ $enquiry->phone }}" class="form-control" disabled aria-describedby="helpId" placeholder="" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" value="{{ $enquiry->email }}" class="form-control" disabled aria-describedby="helpId" placeholder="" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">Product</label>
                <input type="text" value="{{ $enquiry->getproduct->title }}" class="form-control" disabled aria-describedby="helpId" placeholder="" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">CAS Number</label>
                <input type="text" value="{{ $enquiry->cas_number }}" class="form-control" disabled aria-describedby="helpId" placeholder="" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">Country</label>
                <input type="text" value="{{ $enquiry->country }}" class="form-control" disabled aria-describedby="helpId" placeholder="" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">Company Name</label>
                <input type="text" value="{{ $enquiry->company_name }}" class="form-control" disabled aria-describedby="helpId" placeholder="" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <input type="text" value="{{ $enquiry->status }}" class="form-control" disabled aria-describedby="helpId" placeholder="" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">Qty</label>
            <input type="text" value="{{ $enquiry->qty??'' }}" class="form-control" disabled aria-describedby="helpId" placeholder="" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">Remarks</label>
                <input type="text" value="{{ $enquiry->remarks??'' }}" class="form-control" disabled aria-describedby="helpId" placeholder="" />
            </div>
        </div>
        
    </div>
</div>
