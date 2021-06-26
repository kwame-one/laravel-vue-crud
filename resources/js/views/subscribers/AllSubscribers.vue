<template>

    <h1>hee</h1>
</template>


<script>

import {Subscribers} from "../../services"

export default {


    data() {
        return {

            isLoading: false,
            subscribers: []
        }
    },

    methods: {
        loadData() {
            this.isLoading = true;
            Subscribers.index()
                .then(response => {
                    this.isLoading = false;
                    this.subscribers = response;

                    console.log(response.data)
                })
                .catch(error => {
                    this.isLoading = false;
                    console.log(error)
                })

        }
    },

    created() {
        this.loadData();
    }
}

</script>
