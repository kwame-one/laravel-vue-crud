
export default {
    index: async () => axios.get('subscribers'),

    get: async (id) => axios.get(`subscribers/${id}`),

    store: async (data) => axios.post('subscribers', data),

    update: async (id, data) => axios.put(`subscribers/${id}`, data),

    destroy: async (id) => axios.delete(`subscribers/${id}`)

}
