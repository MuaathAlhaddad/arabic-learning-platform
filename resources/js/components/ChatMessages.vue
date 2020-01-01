// resources/assets/js/components/ChatMessages.vue

<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages" v-bind:key="message.id">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.owner.first_name }}
                                <span class="badge badge-info badge-pill">{{ message.sender }}</span>

                    </strong>
                </div>
                <p class="text-white">
                    {{ message.message }}
                </p>
                <small style="color: #dedede">{{ message.created_at }}</small>
            </div>
        </li>
    </ul>
</template>

<script>
  export default {
    props: ['messages'],
  };
</script>