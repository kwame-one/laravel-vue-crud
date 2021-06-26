
export default {
    index() {
        return window.axios.get('subscribers')
            .then(response => Promise.resolve(response.data))
            .catch(error => Promise.reject(error.response.data));
    },

    get(id) {
        return axios.get(`subscribers/${id}`)
            .then(response => Promise.resolve(response.data))
            .catch(error => Promise.reject(error.response.data));
    },

    store(data) {
        return axios.post('subscribers', data)
            .then(response => Promise.resolve(response.data))
            .catch(error => Promise.reject(error.response.data));
    },

    update(id, data) {
        return axios.put(`subscribers/${id}`, data)
        .then(response => Promise.resolve(response.data))
        .catch(error => Promise.reject(error.response.data));
    },

    delete(id) {
        return axios.delete(`subscribers/${id}`)
        .then(response => Promise.resolve(response.data))
        .catch(error => Promise.reject(error.response.data));
    }
}
