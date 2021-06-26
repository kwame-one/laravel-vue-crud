export default {
    index() {
        return axios.get('subscriber_properties')
            .then(response => Promise.resolve(response.data))
            .catch(error => Promise.reject(error.response.data));
    },

    get(id) {
        return axios.get(`subscriber_properties/${id}`)
            .then(response => Promise.resolve(response.data))
            .catch(error => Promise.reject(error.response.data));
    },

    store(data) {
        return axios.post('subscriber_properties', data)
            .then(response => Promise.resolve(response.data))
            .catch(error => Promise.reject(error.response.data));
    },

    update(id, data) {
        return axios.put(`subscriber_properties/${id}`, data)
        .then(response => Promise.resolve(response.data))
        .catch(error => Promise.reject(error.response.data));
    },

    delete(id) {
        return axios.delete(`subscriber_properties/${id}`)
        .then(response => Promise.resolve(response.data))
        .catch(error => Promise.reject(error.response.data));
    }
}
