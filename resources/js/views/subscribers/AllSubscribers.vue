<template>

    <main-content>


        <loading :active="isLoading"
                :can-cancel="false"
                :color="'#3490dc'"
                :is-full-page="true"/>

        <div class="row">

            <div class="col-md-12 mb-2">
                <router-link :to="{name: 'add_subscriber'}" class="offset-md-10"><button type="button" class="btn btn-primary btn-sm">New Subscriber</button></router-link>
            </div>
            <div class="col-md-12">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Org Id</th>
                        <th scope="col">Active</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(subscriber, index) in subscribers" :key="subscriber.id">
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ subscriber.phone }}</td>
                            <td>{{ subscriber.org_id }}</td>
                            <td>{{ subscriber.is_active ? "Yes": "No" }}</td>
                            <td>{{ subscriber.created_at }}</td>
                            <td>
                                <router-link :to="{name: 'edit_subscriber', params: {id: subscriber.id}}">
                                    <span class="btn btn-primary"><i class="small material-icons">edit</i></span>
                                </router-link>
                                <span @click="showModal(subscriber.id)" class="btn btn-danger">
                                    <i class="small material-icons">delete</i>
                                </span>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

        <div ref="modal" class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Subscriber</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you wish to continue?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="deleteSubscriber">Delete</button>
                </div>
                </div>
            </div>
        </div>

    </main-content>


</template>


<script>

import {Subscriber} from "../../services"

export default {


    data() {
        return {

            isLoading: false,
            subscribers: [],
            selectedId: 0
        }
    },

    methods: {

        showModal(id) {
            this.selectedId = id

            $(this.$refs.modal).modal('show')

        },

        async loadData() {
            this.isLoading = true;

            try {
                let response = await Subscriber.index();
                this.subscribers = response.data;
                this.isLoading = false;

            }catch(e) {
                console.log(e)
                this.isLoading = false;
            }


        },

        async deleteSubscriber() {

            $(this.$refs.modal).modal('hide')
            this.isLoading = true;

            try {

                await Subscriber.destroy(this.selectedId);

                this.isLoading = false;

                this.$swal(
                    'Success',
                    'Subscriber Deleted',
                    'success'
                )

                this.loadData();

            }catch(e) {

                this.$swal(
                    'Oops',
                    'Error deleting subscriber',
                    'error'
                )

            }

        }
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
