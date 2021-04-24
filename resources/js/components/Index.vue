<template>
    <div class="container">
        <basic-information
            v-if="basicActive"
            :b-info="basicInfo"
            @nextToPro="nextToPro"
        />
        <professional-information
            v-if="proActive"
            :p-info="proInfo"
            @backToBasic="backToBasic"
            @nextToFinal="nextToFinal"
        />
        <avatar v-if="finalActive" @backToPro="backToPro" @save="save"/>
    </div>

</template>

<script>
import {formDataAssigner} from "./Helpers/helpers";

export default {
    name: "Index",
    data() {
        return {
            basicActive: true,
            proActive: false,
            finalActive: false,
            basicInfo: {},
            proInfo: {},
            message: '',
        }
    },
    methods: {
        nextToPro(basicInfo) {
            this.proActive = true;
            this.basicActive = false;
            this.basicInfo = basicInfo;
        },
        backToBasic() {
            this.basicActive = true;
            this.proActive = false;
        },
        nextToFinal(proInfo) {
            this.finalActive = true;
            this.proActive = false;
            this.proInfo = proInfo;
        },
        backToPro() {
            this.proActive = true;
            this.finalActive = false;
        },
        save(files) {

            this.basicInfo.avatar = files.avatar;
            this.basicInfo.nid = files.nid;

            let data = {
                basic : this.basicInfo,
                educations: this.proInfo.educations,
                publications: this.proInfo.publications,
                experiences: this.proInfo.experiences,
            };

            data = formDataAssigner(new FormData, data);

            axios.post('/store', data)
            .then(({data})=>{
                window.alert(data.message);
                window.location = '/';
            }).catch((errors)=>{
                window.alert(errors.message);
            })
        }
    }

}
</script>
