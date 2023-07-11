<div class="pilot-bid-form offcanvas offcanvas-right p-10" style="display: none; width: 500px; z-index: 98;">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">Pilot Bid View</h3>
        <a href="#" class="close-pilot-bid-form btn btn-xs btn-icon btn-light btn-hover-primary">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <form id="bid-data">
        <input type="hidden" name="id" id="id" value="">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="customer_id" value="{{ $job['user_id'] }}">
        <input type="hidden" name="job_id" value="{{ $job['id'] }}">
        <div class="form-group">
            <label>Type:</label>
            <select class="form-control" name="type" id="type">
                <option>Select bid type</option>
                <option value="Initial Bid">Initial Bid</option>
                <option value="Final Bid">Final Bid</option>
            </select>
        </div>

        <div class="form-group">
            <label>Date Range:</label>
            <div>
                <input type='text' name="bid_start_end_date" class="form-control" id="kt_daterangepicker_1" readonly placeholder="Select time" type="text"/>
            </div>
        </div>

        <div class="form-group">
            <label for="Description">Initial Bid Description:</label>
            <textarea class="form-control" name="bid_desc" id="Description" rows="3"></textarea>
        </div>

        <div class="form-group" id="price-range">
            <label>Price range:</label>
            <select class="form-control" name="price_range">
                <option>Select price range</option>
                <option value="100-250">100-250</option>
                <option value="250-500">250-500</option>
                <option value="500-1000"> 500-1000</option>
                <option value="1000-1500">1000-1500</option>
                <option value="1500-2500">1500-2500</option>
                <option value="2500+">2500+</option>
            </select>
        </div>
        <div class="form-group" id="final-price" style="display:none;">
            <label>Previus Price Range:</label>
            <span id="prev-price-range"></span>
            <input type="text" class="form-control" id="price" name="price">
        </div>
        <button class="btn btn-primary mr-2" id="btn-bid-save">Submit</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
    </form>
</div>