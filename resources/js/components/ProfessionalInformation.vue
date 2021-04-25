<template>
    <div class="mt-5">
        <div class="card">
            <div class="card-header text-center">Professional Info</div>
            <div class="card-body">
                <form>
                    <div class="form-group" v-if="errors.length">
                        <b>Please correct the following error(s):</b>
                        <ul>
                            <li v-for="error in errors">{{ error }}</li>
                        </ul>
                    </div>

                    <!--Educations-->
                    <div class="form-group row mb-5">
                        <label class="col-sm-2 col-form-label">Educations</label>
                        <div class="col-sm-10">
                            <div class="row no-gutters" v-for="(education, index) in proInfo.educations">
                                <div class="col-md-4">
                                    <div class="form-group mr-1">
                                        <input type="text" class="form-control" v-model="education.institute_name"
                                               placeholder="Institute name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mr-1">
                                        <input type="text" class="form-control" v-model="education.qualification"
                                               placeholder="Degree">
                                    </div>
                                </div>
                                <div :class="[proInfo.educations.length > 1 ? 'col-md-3' : 'col-md-4']">
                                    <div class="form-group">
                                        <input type="text" class="form-control" v-model="education.result"
                                               placeholder="Result">
                                    </div>
                                </div>
                                <div v-if="proInfo.educations.length > 1" class="col-md-1">
                                    <button class="btn btn-outline-danger ml-1"
                                            @click.prevent="deleteEducation(index)">
                                        Delete
                                    </button>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-outline-primary" @click.prevent="addEducation">Add</button>
                            </div>
                        </div>
                    </div>

                    <!--Publications-->
                    <div class="form-group row mb-5">
                        <label class="col-sm-2 col-form-label">Publications</label>
                        <div class="col-sm-10">
                            <div class="row no-gutters" v-for="(publication, index) in proInfo.publications">
                                <div class="col-md-6">
                                    <div class="form-group mr-1">
                                        <input type="text" class="form-control" v-model="publication.title"
                                               placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" v-model="publication.link"
                                               placeholder="Provide link">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" v-model="publication.description"
                                                  placeholder="Description">
                                        </textarea>
                                    </div>
                                </div>
                                <div v-if="proInfo.publications.length > 1" class="col-md-12">
                                    <div class="form-group text-right">
                                        <button class="btn btn-outline-danger ml-1" @click.prevent="deletePublication(index)">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-outline-primary" @click.prevent="addPublication">Add</button>
                            </div>
                        </div>
                    </div>

                    <!--Experiences-->
                    <div class="form-group row mb-5">
                        <label class="col-sm-2 col-form-label">Experiences</label>
                        <div class="col-sm-10">
                            <div class="row no-gutters" v-for="(experience, index) in proInfo.experiences">
                                <div class="col-md-6">
                                    <div class="form-group mr-1">
                                        <input type="text" class="form-control" v-model="experience.institute_name"
                                               placeholder="Institute name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" v-model="experience.designation"
                                               placeholder="Designation">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" v-model="experience.description"
                                                  placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-right">
                                        <button class="btn btn-outline-danger" v-if="proInfo.experiences.length > 1" @click.prevent="deleteExperience(index)">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-outline-primary" @click.prevent="addExperience">Add</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="d-flex align-items-center justify-content-between">
                    <button class="btn btn-outline-secondary" @click="backToPrevious">Previous</button>
                    <button class="btn btn-outline-primary" @click="saveAndNext">Next</button>
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
            } else if (_. isEmpty(this.proInfo.educations[0].qualification)) {
                this.errors.push("Education degree is required.");
            } else if (_. isEmpty(this.proInfo.publications[0].title)) {
                this.errors.push("publication title is required")
            } else if (!this.validLink(this.proInfo.publications[0].link)) {
                this.errors.push("publication link is is not valid with 'https://'")
            } else if (_. isEmpty(this.proInfo.experiences[0].institute_name)) {
                this.errors.push("experience institute name is required")
            } else if (_. isEmpty(this.proInfo.experiences[0].designation)) {
                this.errors.push("experience designation is required")
            } else {
                this.$emit('nextToFinal', this.proInfo);
            }
        },
        backToPrevious() {
            this.$emit('backToBasic');
        },
        validLink(url) {
            if (!_. isEmpty(url)) {
                let pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
                    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
                return pattern.test(url);
            }
        }
    }
}
</script>

