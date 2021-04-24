<template>
    <div class="mt-5">
        <div class="card">
            <div class="card-header text-center">Professional Info</div>
            <div class="card-body">
                <form class="mt-4">
                    <p class="form-group" v-if="errors.length">
                        <b>Please correct the following error(s):</b>
                        <ul>
                            <li v-for="error in errors">{{ error }}</li>
                        </ul>
                    </p>
                    <!--Educations-->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Educations</label>
                        <div class="col-sm-9" v-for="(education, index) in proInfo.educations">
                            <div class="row">
                                <input type="text" class="form-control col-md-4" v-model="education.institute_name"
                                       placeholder="Institute name">
                                <input type="text" class="form-control col-md-4" v-model="education.qualification"
                                       placeholder="Degree">
                                <input type="text" class="form-control col-md-4" v-model="education.result"
                                       placeholder="Result">
                            </div>
                            <button class="btn btn-outline-danger" v-if="proInfo.educations.length > 1" @click.prevent="deleteEducation(index)">delete</button>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-outline-primary" @click.prevent="addEducation">Add</button>
                        </div>
                    </div>
                    <!--Publications-->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Publications</label>
                        <div class="col-sm-9" v-for="(publication, index) in proInfo.publications">
                            <div class="row">
                                <input type="text" class="form-control col-md-4" v-model="publication.title"
                                       placeholder="Title">
                                <input type="text" class="form-control col-md-4" v-model="publication.link"
                                       placeholder="Provide link">
                                <textarea class="form-control col-md-4" v-model="publication.description"
                                       placeholder="description">
                                </textarea>
                            </div>
                            <button class="btn btn-outline-danger" v-if="proInfo.publications.length > 1" @click.prevent="deletePublication(index)">delete</button>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-outline-primary" @click.prevent="addPublication">Add</button>
                        </div>
                    </div>
                    <!--Experiences-->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Experiences</label>
                        <div class="col-sm-9" v-for="(experience, index) in proInfo.experiences">
                            <div class="row">
                                <input type="text" class="form-control col-md-4" v-model="experience.institute_name"
                                       placeholder="Institute name">
                                <input type="text" class="form-control col-md-4" v-model="experience.designation"
                                       placeholder="Designation">
                                <textarea class="form-control col-md-4" v-model="experience.description"
                                          placeholder="Description">

                                </textarea>
                            </div>
                            <button class="btn btn-outline-danger" v-if="proInfo.experiences.length > 1" @click.prevent="deleteExperience(index)">delete</button>
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
    props: {
        pInfo: {}
    },
    data() {
        return {
            proInfo: {
                educations: [{institute_name: '', qualification: '', result: ''}],
                publications: [{title: '', link: '', description: ''}],
                experiences: [{institute_name: '', designation: '', description: ''}],
            },
            errors: [],
        }
    },

    created() {
        if (!_. isEmpty(this.pInfo)) {
            this.proInfo = this.pInfo;
        }
    },
    methods: {
        addEducation() {
            this.proInfo.educations.push({institute_name: '', qualification: '', result: '',})
        },
        deleteEducation(index) {
            this.proInfo.educations.splice(index, 1);
        },
        addPublication() {
            this.proInfo.publications.push({ title: '', link: '', description: '',});
        },
        deletePublication(index) {
            this.proInfo.publications.splice(index, 1);
        },
        addExperience() {
            this.proInfo.experiences.push({institute_name: '', designation: '', description: '',})
        },
        deleteExperience(index) {
            this.proInfo.experiences.splice(index, 1)
        },
        saveAndNext() {
            if (_. isEmpty(this.proInfo.educations[0].institute_name)) {
                this.errors.push("Education institute name is required.");
            }
            if (_. isEmpty(this.proInfo.educations[0].qualification)) {
                this.errors.push("Education degree is required.");
            }
            if (_. isEmpty(this.proInfo.publications[0].title)) {
                this.errors.push("publication title is required")
            }
            if (_. isEmpty(this.proInfo.experiences[0].institute_name)) {
                this.errors.push("experience institute name is required")
            }
            if (_. isEmpty(this.proInfo.experiences[0].designation)) {
                this.errors.push("experience designation is required")
            }
            else {
                this.$emit('nextToFinal', this.proInfo);
            }

        },
        backToPrevious() {
            this.$emit('backToBasic');
        }
    }
}
</script>

