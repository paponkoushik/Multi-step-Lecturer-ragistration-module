<template>
    <div class="mt-5">
        <div class="card">
            <div class="card-header text-center">Final</div>
            <div class="card-body">
                <form class="mt-4">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Avatar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" accept="image/x-png"
                                   @change="onAvatarChange" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NID</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" accept="image/x-png"
                                   @change="onNidChange" />
                        </div>
                    </div>

                </form>
                <div class="mt-5">
                    <button class="btn btn-outline-primary float-md-right" @click.prevent="save">Save</button>
                    <button class="btn btn-outline-secondary float-md-left" @click.prevent="backToPro">Previous</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "Avatar",
    data() {
        return {
            files: {
                avatar: '',
                nid: '',
            }
        }
    },
    methods: {
        backToPro() {
            this.$emit('backToPro');
        },
        save() {
            this.$emit('save', this.files);
        },
        onAvatarChange(event) {
            this.files.avatar = event.target.files[0];
        },
        onNidChange(event) {
            this.files.nid = event.target.files[0];
        }
    }
}
</script>

