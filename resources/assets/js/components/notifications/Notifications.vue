<template>
    <div class="container">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Notificações ({{ notifications.length }}) <span class="caret"></span>
               
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                
                <notification 
                    v-for="notification in notifications" 
                    :key="notification.id"
                    :notification="notification">
                </notification>


                <a class="dropdown-item" href="#" @click.prevent="markAllAsRead">
                    Limpar notificações
                </a>
            </div>
        </li>

    </div>
</template>

<script>

export default {

    created () {
      //  this.loadNotifications()
      this.$store.dispatch('loadNotifications')
    },

    computed: {
        notifications() {
            return this.$store.state.notifications.items // this.notificationsItems
        }
    },

    methods: {
        markAllAsRead (){
            this.$store.dispatch('markAllAsRead')
        }
    }

}
</script>
