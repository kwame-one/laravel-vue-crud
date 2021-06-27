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
                        <h5 class="card-title">Assign Subscriber Property Value</h5>
                        <div class="card-text">

                            <form @submit.prevent="submit">

                                <div class="row mt-3">

                                     <div class="col-md-6">
                                        <label for="subscriber_id" class="form-label">Subscriber</label>
                                        <select class="form-control" v-model="subscriberPropertyValue.subscriber_id">
                                          <option value="">Select</option>
                                            <option v-for="subscriber in subscribers" :value="subscriber.id" :key="subscriber.id">
                                              {{ subscriber.phone }}
                                          </option>
                                        </select>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="org_id" class="form-label">Org Id</label>
                                        <input type="text" class="form-control" id="org_id" placeholder="" v-model="subscriberPropertyValue.org_id">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="subscriber_property_id" class="form-label">Subscriber Property</label>
                                        <select id="subscriber_property_id" class="form-control" v-model="subscriberPropertyValue.subscriber_property_id">
                                          <option value="">Select</option>
                                          <option v-for="subscriberProperty in subscriberProperties" :value="subscriberProperty.id" :key="subscriberProperty.id">
                                              {{ subscriberProperty.name }}
                                          </option>
                                        </select>
                                    </div>

                                      <div class="col-md-6">
                                        <label for="value" class="form-label">value</label>
                                        <input type="text" class="form-control" id="value" placeholder="" v-model="subscriberPropertyValue.value">
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

    import {SubscriberPropertyValue, SubscriberProperty, Subscriber} from "../../services"

    export default {

        data() {
            return {
                isLoading: false,
                subscriberPropertyValue: {
                    org_id: '',
                    value: '',
                    subscriber_id: '',
                    subscriber_property_id: '',
                    updated_at: ''
                },
                subscribers: [],
                subscriberProperties: []
            }
        },

        methods: {
            async submit() {
                this.isLoading = true;

                try {
                    await SubscriberPropertyValue.store(this.subscriberPropertyValue);
                    this.isLoading = false;

                    this.$swal(
                        'Success',
                        'Subscriber Property Value Assigned',
                        'success'
                    )

                    this.subscriberPropertyValue = {}

                }catch(e) {
                    console.log(e)
                    this.isLoading = false;

                    this.$swal('Oops','Please fill all fields', 'error')
                }

            },

            async loadData() {

                try {
                    let response = await Subscriber.index();

                    this.subscribers = response.data;

                    console.log(this.subscribers)

                    let result = await SubscriberProperty.index();

                    this.subscriberProperties = result.data;

                    console.log(this.subscriberProperties)


                }catch(e) {

                    this.isLoading = false;

                    this.swal("Oops", "Error fetching subscribers and subscriber properties", "error")

                }

            },

        },

        created() {
            this.loadData();
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
