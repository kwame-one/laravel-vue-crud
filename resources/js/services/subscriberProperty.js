import axios from "axios";

export default {
    index: async () => axios.get('subscriber_properties'),

    get: async (id) => axios.get(`subscriber_properties/${id}`),

    store: async (data) => axios.post('subscriber_properties', data),

    update: async (id, data) => axios.put(`subscriber_properties/${id}`, data),

    destroy: async (id) => axios.delete(`subscriber_properties/${id}`)

}
