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
                :notification="notification"
                >
                </notification>


                <a class="dropdown-item" href="#">
                    Limpar notificações
                </a>
            </div>
        </li>

    </div>
</template>

<script>
import axios from 'axios';

export default {


    created() {
        this.loadNotifications()
    },

    computed: {
        notifications() {
            return this.notificationsItems
        }
    },

    data() {
        return {
            notificationsItems: []
        }
    },

    methods: {
        loadNotifications() {
            axios.get('http://localhost:88/laravel-notifications/public/notifications').then(response => this.notificationsItems = response.data.notifications)
        }
    }

}
</script>
