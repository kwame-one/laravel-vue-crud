import axios from "axios";

export default {
    index: async () => axios.get('subscriber_property_values'),

    get: async (id) => axios.get(`subscriber_property_values/${id}`),

    store: async (data) => axios.post('subscriber_property_values', data),

    update: async (id, data) => axios.put(`subscriber_property_values/${id}`, data),

    destroy: async (id) => axios.delete(`subscriber_property_values/${id}`)

}
