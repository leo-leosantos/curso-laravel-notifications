export default {
    state: {
        items: []
    },

    mutations: {
        LOAD_NOTIFICATIONS(state, notifications) {
            state.items = notifications

        },
        MARK_AS_READ(state, id){
            let index = state.items.filter(notification => notification.id == id )
            state.items.splice(index, 1)
        },
        MARK_ALL_AS_READ(state)
        {
            state.items = []
        },
        ADD_NOTIFICATION(state, notification){
            state.items.push(notification)
        },
    },

    actions: {
        loadNotifications(context) {
            axios.get('http://localhost:88/laravel-notifications/public/notifications')
                .then(response => {

                    context.commit('LOAD_NOTIFICATIONS', response.data.notifications)
                })

        },
        markAsRead(context, params) {

           // axios.put('http://localhost:88/laravel-notifications/public/notification-read', params)

           axios.put('http://localhost:88/laravel-notifications/public/notification-read', params)
           .then(() => context.commit('MARK_AS_READ', params.id))
        },
        markAllAsRead(context)
        {
            axios.put('http://localhost:88/laravel-notifications/public/notification-all-read')
            .then(() => context.commit('MARK_ALL_AS_READ'))

        }
    }
}