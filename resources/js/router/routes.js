import Home from '../views/home/Home.vue'
import AllSubscribers from "../views/subscribers/AllSubscribers.vue"
import AddSubscriber from "../views/subscribers/AddSubscriber.vue"
import EditSubscriber from "../views/subscribers/EditSubscriber.vue"
import AllSubscriberProperty from "../views/subscriber_properties/AllSubscriberProperty"
import AddSubscriberProperty from "../views/subscriber_properties/AddSubscriberProperty.vue"
import EditSubscriberProperty from "../views/subscriber_properties/EditSubscriberProperty.vue"
import AddSubscriberPropertyValue from "../views/subscriber_property_values/AddSubscriberPropertyValue.vue"
import AllSubscriberPropertyValue from "../views/subscriber_property_values/AllSubscriberPropertyValue.vue"

export  default [

    {
        name: 'subscribers',
        path: '/',
        component: AllSubscribers
    },
    {
        name: '/subscribers',
        path: '/',
        component: AllSubscribers
    },
    {
        name: 'add_subscriber',
        path: '/subscribers/create',
        component: AddSubscriber
    },
    {
        name: "edit_subscriber",
        path: '/subscribers/:id',
        component: EditSubscriber
    },
    {
        name: 'subscriber_properties',
        path: '/subscriber_properties',
        component: AllSubscriberProperty
    },
    {
        name: 'add_subscriber_property',
        path: '/subscriber_properties/create',
        component: AddSubscriberProperty
    },
    {
        name: "edit_subscriber_property",
        path: '/subscriber_properties/:id',
        component: EditSubscriberProperty
    },
    {
        name: "assign_property_values",
        path: '/assign_property_values',
        component: AddSubscriberPropertyValue
    },
    {
        name: "subscriber_property_values",
        path: '/subscriber_property_values',
        component: AllSubscriberPropertyValue
    }
]
