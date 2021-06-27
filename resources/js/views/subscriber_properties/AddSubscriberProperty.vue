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
                        <h5 class="card-title">New Subscriber Property</h5>
                        <div class="card-text">

                            <form @submit.prevent="submit">

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">name</label>
                                        <input type="text" class="form-control" id="name" placeholder="" v-model="subscriberProperty.name">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="org_id" class="form-label">Org Id</label>
                                        <input type="text" class="form-control" id="org_id" placeholder="" v-model="subscriberProperty.org_id">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="is_private" class="form-label">Private</label>
                                        <select class="form-control" v-model="subscriberProperty.is_private">
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6 offset-md-5">
                                        <button type="submit" class="btn btn-primary col-md-6 btn-block">Save</button>
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

    import SubscriberProperty from "../../services/subscriberProperty"

    export default {

        data() {
            return {
                isLoading: false,
                subscriberProperty: {
                    org_id: '',
                    name: '',
                    is_private: ''
                }
            }
        },

        methods: {
            async submit() {
                this.isLoading = true;

                try {
                    await SubscriberProperty.store(this.subscriberProperty);
                    this.isLoading = false;

                    this.$swal(
                        'Success',
                        'SubscriberProperty Added',
                        'success'
                    )

                    this.subscriberProperty = {}

                }catch(e) {
                    console.log(e)
                    this.isLoading = false;

                    this.$swal('Oops','Please fill all fields', 'error')
                }

            }
        },

        created() {
            console.log('created')
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
