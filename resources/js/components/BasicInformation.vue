<template>
    <div class="mt-5">
        <div class="card">
            <div class="card-header text-center">Basic Info</div>
            <div class="card-body">
                <form class="mt-4">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="basicInfo.name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" v-model="basicInfo.email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="basicInfo.phone"/>
                        </div>
                    </div>
                </form>
                <div class="mt-5">
                    <button class="btn btn-outline-primary float-md-right" @click="saveAndNext">Next</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "BasicInformation",
    data() {
        return {
            basicInfo: {},
        }
    },
    methods: {
        saveAndNext() {
            this.$emit('nextToPro', this.basicInfo)
        }
    }
}
</script>
