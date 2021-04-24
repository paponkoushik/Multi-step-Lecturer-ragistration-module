<template>
    <div class="mt-5">
        <div class="card">
            <div class="card-header text-center">Professional Info</div>
            <div class="card-body">
                <form class="mt-4">
                    <!--Educations-->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Educations</label>
                        <div class="col-sm-9" v-for="(education, index) in educations">
                            <div class="row">
                                <input type="text" class="form-control col-md-4" v-model="education.institute_name">
                                <input type="text" class="form-control col-md-4" v-model="education.qualification">
                                <input type="text" class="form-control col-md-4" v-model="education.result">
                            </div>
                            <button class="btn btn-outline-danger" v-if="educations.length > 1" @click.prevent="deleteEducation(index)">delete</button>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-outline-primary" @click.prevent="addEducation">Add</button>
                        </div>
                    </div>
                    <!--Publications-->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Publications</label>
                        <div class="col-sm-9" v-for="(publication, index) in publications">
                            <div class="row">
                                <input type="text" class="form-control col-md-4" v-model="publication.title">
                                <input type="text" class="form-control col-md-4" v-model="publication.link">
                                <input type="text" class="form-control col-md-4" v-model="publication.description">
                            </div>
                            <button class="btn btn-outline-danger" v-if="publications.length > 1" @click.prevent="deletePublication(index)">delete</button>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-outline-primary" @click.prevent="addPublication">Add</button>
                        </div>
                    </div>
                    <!--Experiences-->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Experiences</label>
                        <div class="col-sm-9" v-for="(experience, index) in experiences">
                            <div class="row">
                                <input type="text" class="form-control col-md-4" v-model="experience.institute_name">
                                <input type="text" class="form-control col-md-4" v-model="experience.designation">
                                <input type="text" class="form-control col-md-4" v-model="experience.description">
                            </div>
                            <button class="btn btn-outline-danger" v-if="experiences.length > 1" @click.prevent="deleteExperience(index)">delete</button>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-outline-primary" @click.prevent="addExperience">Add</button>
                        </div>
                    </div>
                </form>
                <div class="mt-5">
                    <button class="btn btn-outline-primary float-md-right" @click="saveAndNext">Next</button>
                    <button class="btn btn-outline-secondary float-md-left" @click="backToPrevious">Previous</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProfessionalInformation",
    data() {
        return {
            proInfo: {},
            educations: [{institute_name: '', qualification: '', result: ''}],
            publications: [{title: '', link: '', description: ''}],
            experiences: [{institute_name: '', designation: '', description: ''}],
        }
    },
    methods: {
        addEducation() {
            this.educations.push({institute_name: '', qualification: '', result: '',})
        },
        deleteEducation(index) {
            this.educations.splice(index, 1);
        },
        addPublication() {
            this.publications.push({ title: '', link: '', description: '',});
        },
        deletePublication(index) {
            this.publications.splice(index, 1);
        },
        addExperience() {
            this.experiences.push({institute_name: '', designation: '', description: '',})
        },
        deleteExperience(index) {
            this.experiences.splice(index, 1)
        },
        saveAndNext() {
            let data = {
                educations: this.educations,
                publications: this.publications,
                experiences: this.experiences
            }
            this.$emit('nextToFinal', data);
        },
        backToPrevious() {
            this.$emit('backToBasic');
        }
    }
}
</script>

