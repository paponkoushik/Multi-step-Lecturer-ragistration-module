<template>
    <div class="container">

        <basic-information 
            v-if="basicActive" 
            @nextToPro="nextToPro"
        >
        </basic-information>

        <professional-information 
            v-if="proActive" 
            @backToBasic="backToBasic" 
            @nextToFinal="nextToFinal"
        >
        </professional-information>

        <avatar v-if="finalActive" @backToPro="backToPro">

        </avatar>
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
            data: [],
        }
    },
    methods: {
        nextToPro(basicInfo) {
            this.proActive = true;
            this.basicActive = false;
            this.data.push(basicInfo);
        },
        backToBasic() {
            this.basicActive = true;
            this.proActive = false;
        },
        nextToFinal() {
            this.finalActive = true;
            this.proActive = false;

        },
        backToPro() {
            this.proActive = true;
            this.finalActive = false;
        }
    }

}
</script>
