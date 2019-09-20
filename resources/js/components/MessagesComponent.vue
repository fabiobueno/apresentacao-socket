<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mensagens Socket</div>
                    <div class="card-body">
                        <ul>
                            <li v-for="item in messages">{{ item.message }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data(){
            return {
                messages: []
            }
        },

        mounted() {

            window.Echo.private(`messages.${this.user}`)
                .listen('.newMessage', (message) => {
                    this.messages.push(message);
                });
        }
    }
</script>
