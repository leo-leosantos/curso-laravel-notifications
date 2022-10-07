export default {
    state: {
        items: []
    },

    mutations: {
        LOAD_NOTIFICATIONS (state, notifications)
        {
            state.items = notifications

        }
    },

    actions: {
        loadNotifications (context){
            axios.get('http://localhost:88/laravel-notifications/public/notifications')
                .then(response => {
                    
                    context.commit('LOAD_NOTIFICATIONS', response.data.notifications)
        })

    },
    }
}