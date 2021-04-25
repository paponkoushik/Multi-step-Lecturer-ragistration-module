<template>
    <div class="mt-5">
        <div class="card">
            <div class="card-header text-center">Basic Info</div>
            <div class="card-body">
                <form>
                    <div class="mb-2" v-if="errors.length">
                        <b>Please correct the following error(s):</b>
                        <ul>
                            <li v-for="error in errors">{{ error }}</li>
                        </ul>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-2 mb-0">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="basicInfo.name" required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-2 mb-0">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" v-model="basicInfo.email" required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-2 mb-0">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="basicInfo.phone" required/>
                        </div>
                    </div>
                </form>
                <button class="btn btn-outline-primary float-md-right"
                        type="submit"
                        @click.prevent="saveAndNext">
                    Next
                </button>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "BasicInformation",
    props: {
        bInfo: {}
    },
    data() {
        return {
            basicInfo: {},
            errors: [],
        }
    },
    created() {
        if(!_. isEmpty(this.bInfo)) {
            this.basicInfo = this.bInfo;
        }
    },
    methods: {
        saveAndNext() {
            if (!this.basicInfo.name) {
                this.errors.push("Name required.");
            } if (!this.basicInfo.email) {
                this.errors.push('Email required.');
            } else if (!this.validEmail(this.basicInfo.email)) {
                this.errors.push('Valid email required.');
            } else this.$emit('nextToPro', this.basicInfo)
        },
        validEmail (email) {
            let type = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return type.test(email);
        }
    }
}
</script>
