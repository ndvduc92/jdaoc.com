<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Tra cứu vật phẩm</label>
    <form class="col-md-6 col-sm-6 input-group">
        <select class="select2_single_custom form-control" name="type" id="itemid">
            <option></option>
        </select>
        <span class="input-group-btn">
            <button type="button" class="btn btn-primary" onclick="myFunction(event)">Copy ID</button>
        </span>
    </form>
</div>

<script>
    function myFunction(event) {
       
        navigator.clipboard.writeText($("#itemid").val());
    }
</script>