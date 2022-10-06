<template>
    <div>
        <a class="dropdown-item" href="#">
          {{notification.user_id  }}   {{ notification.title }}
        </a>
    </div>
</template>


<script>

export default {
    props: ['notification'],
    computed: {
        comment()
        {
            return this.notification.body
        }
    }
}
</script>>