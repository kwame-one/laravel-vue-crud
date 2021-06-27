<template>

    <main-content>


        <loading :active="isLoading"
                :can-cancel="false"
                :color="'#3490dc'"
                :is-full-page="true"/>

        <div class="row">

            <div class="col-md-12 mb-2">
                <router-link :to="{name: 'assign_property_values'}" class="offset-md-10"><button type="button" class="btn btn-primary btn-sm">Assign Property Value</button></router-link>
            </div>
            <div class="col-md-12">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subscriber Id</th>
                        <th scope="col">Subscriber Phone</th>
                        <th scope="col">Org Id</th>
                        <th scope="col">Subscriber Property</th>
                        <th scope="col">Value</th>
                        <th scope="col">Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(value, index) in values" :key="value.id">
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ value.subscriber.id }}</td>
                            <td>{{ value.subscriber.phone }}</td>
                            <td>{{ value.org_id }}</td>
                            <td>{{ value.subscriber_property.name }}</td>
                            <td>{{ value.value }}</td>
                            <td>{{ value.updated_at }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

    </main-content>


</template>


<script>

import {SubscriberPropertyValue} from "../../services"

export default {


    data() {
        return {

            isLoading: false,
            values: [],
        }
    },

    methods: {

        async loadData() {
            this.isLoading = true;

            try {
                let response = await SubscriberPropertyValue.index();
                this.values = response.data;
                console.log(response.data)
                this.isLoading = false;

            }catch(e) {
                console.log(e)
                this.isLoading = false;
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
   .table-responsive {
        display: table;
    }
</style>
