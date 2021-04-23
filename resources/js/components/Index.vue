<template>
    <div class="container">

        <basic-information 
            v-if="basicActive" 
            @nextToPro="nextToPro"
        />
        

        <professional-information 
            v-if="proActive" 
            @backToBasic="backToBasic" 
            @nextToFinal="nextToFinal"
        />

        <avatar v-if="finalActive" @backToPro="backToPro" @save="save"/>
    </div>

</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            basicActive: true,
            proActive: false,
            finalActive: false,
            basicInfo: {},
            proInfo: {},
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
        save() {
            let formData = {
                basic : this.basicInfo,
                pro : this.proInfo,
            }
            axios.post('/store', formData)
            .then(res=>{

            }).catch(err=>{})
        }
    }

}
</script>
