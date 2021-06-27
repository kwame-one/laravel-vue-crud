<template>

    <div>

        <main-content>

            <loading :active="isLoading"
                 :can-cancel="false"
                 :color="'#3490dc'"
                 :is-full-page="true"/>


            <div class="col-md-10 auto">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Subscriber</h5>
                        <div class="card-text">

                            <form @submit.prevent="submit">

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" placeholder="" v-model="subscriber.phone">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="org_id" class="form-label">Org Id</label>
                                        <input type="text" class="form-control" id="org_id" placeholder="" v-model="subscriber.org_id">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="is_active" class="form-label">Active</label>
                                        <select class="form-control" v-model="subscriber.is_active">
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6 offset-md-5">
                                        <button type="submit" class="btn btn-primary col-md-5 btn-block">Update</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </main-content>

    </div>

</template>


<script>

    import Subscriber from "../../services/subscriber"

    export default {

        data() {
            return {
                isLoading: false,
                subscriber: {
                    phone: '',
                    org_id: '',
                    is_active: ''
                }
            }
        },

        methods: {
            async submit() {
                this.isLoading = true;

                try {
                    await Subscriber.update(this.$route.params.id, this.subscriber);
                    this.isLoading = false;


                    this.$router.push({name: 'subscribers'})
                }catch(e) {

                    this.isLoading = false;

                    this.$swal('Oops','Error updating subcriber', 'error')
                }

            },

            async getSubscriber() {
                this.isLoading = true

                try {
                    let response = await Subscriber.get(this.$route.params.id)

                    this.subscriber = response.data


                    this.isLoading = false
                }catch(e) {

                    this.isLoading = false
                }
            }
        },

        created() {
            this.getSubscriber()
        }

    }

</script>

<style scoped>
    .auto {
        margin: auto;
    }
    .card-title {
        text-align: center;
    }

</style>
