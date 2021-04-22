<template>
    <div class="mt-5">
        <div class="card">
            <div class="card-header text-center">Basic Info</div>
            <div class="card-body">
                <form class="mt-4">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Avatar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NID</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file"/>
                        </div>
                    </div>

                </form>
                <div class="mt-5">
                    <button class="btn btn-outline-primary float-md-right">Save</button>
                    <button class="btn btn-outline-secondary float-md-left">Previous</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "Avatar"
}
</script>

