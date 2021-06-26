export default {
    index() {
        return axios.get('subscriber_property_values')
            .then(response => Promise.resolve(response.data))
            .catch(error => Promise.reject(error.response.data));
    },

    get(id) {
        return axios.get(`subscriber_property_values/${id}`)
            .then(response => Promise.resolve(response.data))
            .catch(error => Promise.reject(error.response.data));
    },

    store(data) {
        return axios.post('subscriber_property_values', data)
            .then(response => Promise.resolve(response.data))
            .catch(error => Promise.reject(error.response.data));
    },

    update(id, data) {
        return axios.put(`subscriber_property_values/${id}`, data)
        .then(response => Promise.resolve(response.data))
        .catch(error => Promise.reject(error.response.data));
    },

    delete(id) {
        return axios.delete(`subscriber_property_values/${id}`)
        .then(response => Promise.resolve(response.data))
        .catch(error => Promise.reject(error.response.data));
    }
}
