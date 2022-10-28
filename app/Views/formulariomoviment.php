<?= $this->extend('/templates/default')?>
<?= $this->section('content')?>
    <div id="form-moviment">
        <form action="<?php echo base_url()?>/moviments/save" method="POST">
            <input type="hidden" name="id" />
            <div class="input-group mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date</label>
                <input type="date" name="date" class="form-control"  >
            </div>
            <div class="input-group mb-3">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <input type="text" name="description" class="form-control"  placeholder="">
            </div>
            <div class="input-group mb-3">
                <label for="exampleFormControlInput1" class="form-label">Value</label>
                <span class="input-group-text" id="basic-addon1">R$</span>
                <input type="text" name="value" class="form-control"  placeholder="">
            </div>
            <div class="input-group mb-3">
                <label for="exampleFormControlInput1" class="form-label">Type</label>
                <select name="type">
                    <option></option>
                    <option value="input">In</option>
                    <option value="output">Out</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <input class="btn btn-primary" type="submit" name="save_moviment" value="Save" />
            </div>
        </form>
    </div>
<?= $this->endSection()?>